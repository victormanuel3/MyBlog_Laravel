<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    
    // Desactivar los timestamps automáticos
    public $timestamps = false;
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'user_id'
    ];
}
