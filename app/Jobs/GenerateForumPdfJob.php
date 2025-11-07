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

class GenerateForumPdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $forum;
    protected $students;

    /**
     * Create a new job instance.
     */
    public function __construct($forum, $students)
    {
        $this->forum = $forum;
        $this->students = $students;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $folder_path = 'forums_certificates';
            $path = $folder_path . '/' . $this->forum->id;
            // Crear el path si no existe
            if (!File::exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }

            $forum = $this->forum;
            foreach ($this->students as $forum_student) {
                $student = $forum_student->student;
                $filename = $student->id . '_' . str_replace(' ', '', Str::title($student->name)) . '.pdf';

                $pdf = Pdf::loadView('forums_certificates.pdf', compact('forum', 'student'));
                $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
                $pdf->setPaper('A4', 'landscape');
                $pdf_content = $pdf->output();
                Storage::disk('public')->put($path . '/' . $filename, $pdf_content);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
