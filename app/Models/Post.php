<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory,Notifiable;

    protected $fillable=[
        'course_id',
        'user_id',
        'caption',
        'file'
    ];
}
