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

use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $course;
    protected $students;

    /**
     * Create a new job instance.
     */
    public function __construct($course, $students)
    {
        $this->course = $course;
        $this->students = $students;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $folder_path = 'public/storage/certificates';
            $path = $folder_path . '/' . str_replace(' ', '-', Str::lower($this->course->name));
            // Crear el path si no existe
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $course = $this->course;
            foreach ($this->students as $course_student) {
                $student = $course_student->student;
                $student->hash_certificate = Hash::make($course_student->hash_certificate);
                $filename = $student->id . '_' . str_replace(' ', '', Str::title($student->name)) . '.pdf';


                $pdf = Pdf::loadView('certificates.pdf', compact('course', 'students'));
                $pdf->setPaper('A4', 'landscape');
                $pdf->save($path . '/' . $filename);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
