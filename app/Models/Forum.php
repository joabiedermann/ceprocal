<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'date',
        'hours',
        'certificates_generated',
        'status',
    ];

    public function Students(){
        return $this->hasMany(ForumStudent::class);
    }
}
