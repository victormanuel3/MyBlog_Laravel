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
    /*Relacion pertenece a
    $this->belongsTo(
    Modelo a relacionar, 
    foreign key(Laravel cuenta con uan convención que intuye que la foreign key es modelo actual_id),
    primary key(Laravel intuye que es id);
    )*/
    public function user(){
        return $this->belongsTo(User::class);
    }
}
