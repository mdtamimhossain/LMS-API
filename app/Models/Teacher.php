<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable=[
        'name',
        'email',
        'password',
        'number',
        'verification_code',
        'degree',
        'university',
        'photo',
        'cv',
        'video_resume'
    ];
}
