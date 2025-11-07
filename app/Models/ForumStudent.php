<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumStudent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'forum_id',
        'student_id',
        'hash_certificate',
        'path_certificate',
        'send_status',
        'send_date',
    ];

    public function Forum(){
        return $this->belongsTo(Forum::class);
    }

    public function Student(){
        return $this->belongsTo(Student::class);
    }
}
