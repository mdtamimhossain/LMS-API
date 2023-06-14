<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'number',
        'degree',
        'university',
        'photo',
        'cv',
        'video_resume'
    ];
}
