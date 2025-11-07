<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forum_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forum_id')->constrained('forums');
            $table->foreignId('student_id')->constrained('students');
            $table->string('hash_certificate')->nullable();
            $table->string('path_certificate')->nullable();
            $table->string('send_status')->default('Pendiente');
            $table->timestamp('send_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_students');
    }
};
