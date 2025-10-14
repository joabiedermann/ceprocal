<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'teacher_id',
        'start_date',
        'end_date',
        'hours',
        'status',
    ];

    public function Teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function Modules(){
        return $this->hasMany(CourseModule::class);
    }

    public function Students(){
        return $this->hasMany(CourseStudent::class);
    }

    public function Companies(){
        return $this->hasMany(CourseCompany::class);
    }
}
