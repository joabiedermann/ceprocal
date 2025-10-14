<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'fantasy_name',
        'real_name',
        'document_number',
        'activity',
        'phone_number',
        'email',
        'address',
        'country',
        'city',
        'logo',
    ];
}
