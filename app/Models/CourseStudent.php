<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'course_id',
        'student_id',
        'hash_certificate',
        'send_status',
        'send_date',
    ];

    public function Course(){
        return $this->belongsTo(Course::class);
    }

    public function Student(){
        return $this->belongsTo(Student::class);
    }
}
