<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

use App\Jobs\UpdateCourseStudentJob;

use App\Models\CourseStudent;

class SendCertificateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $course_student;
    protected $ms_token;

    /**
     * Create a new job instance.
     */
    public function __construct($course_student, $ms_token)
    {
        $this->course_student = $course_student;
        $this->ms_token = $ms_token;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $from = env('MSGRAPH_SENDER');
            if (empty($from)) {
                Log::error('No se ha configurado el remitente en las variables de entorno.');
                return;
            }

            $course_student = $this->course_student;

            $recipient = [
                ['emailAddress' => ['address' => $course_student->student->email]],
            ];

            $file = Storage::disk('public')->get(str_replace('storage/', '', $course_student->path_certificate));

            if (!$file) {
                Log::error('No se pudo leer el archivo adjunto desde el almacenamiento.', [
                    'path' => $course_student->path_certificate
                ]);
                return;
            }

            $base64_file = base64_encode($file);

            $attachment = [
                [
                    '@odata.type' => '#microsoft.graph.fileAttachment',
                    'name' => 'Certificado.pdf',
                    'contentBytes' => $base64_file,
                ]
            ];

            $subject = 'Certificado de Finalización del Curso ' . $course_student->course->name;

            $body_content = "<p>Hola {$course_student->student->name},</p>
                             <p>Adjunto encontrará su certificado de finalización del curso {$course_student->course->name}.</p>
                             <p>¡Felicidades por su logro!</p>
                             <p>Saludos cordiales,</p>
                             <p>El equipo de Ceprocal</p>";

            $body = [
                'message' => [
                    'subject' => $subject,
                    'body' => [
                        'contentType' => 'HTML',
                        'content' => $body_content,
                    ],
                    'toRecipients' => $recipient,
                    'attachments' => $attachment,
                ],
                'saveToSentItems' => false,
            ];

            
            $response = Http::withToken($this->ms_token)
                ->post('https://graph.microsoft.com/v1.0/users/' . $from . '/sendMail', $body);

            if ($response->successful()) {
                Log::info('Correo enviado correctamente a: ' . $course_student->student->email);
            } else {
                Log::error('Error al enviar correo', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
            }

        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
