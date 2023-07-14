<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PostComment extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = ['post_id', 'user_id', 'content'];
}
