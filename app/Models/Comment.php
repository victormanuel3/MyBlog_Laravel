<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'body',
        'user_id',
        'commentable_id',
        'commentable_type'
    ];

    /* 
    Es como el belongsTo, laravel dice que un comentario puede estar relacionado (pertenece a) varios modelos.
    */
    public function commentable(){
        return $this->morphTo();
    }
    /* ---------------------------------------------------------------------------------------------------- */
    public function user() {
        return $this->belongsTo(User::class);
    }
    /* ---------------------------------------------------------------------------------------------------- */
    public function reply() {
        return $this->morphMany($this, 'commentable');
    }
    /**
     * Accesor que convierte la fecha de creación (`created_at`) en un formato legible, 
     * como "hace 1 hora" o "hace 2 días".
     * 
     * Laravel usa la convención "get{Atributo}Attribute" para reconocerlo como un accesor. 
     * Esto permite acceder a este valor como si fuera una propiedad del modelo, sin necesidad 
     * de llamar al método directamente y porque es un método del modelo y no una relación, poner 
     * cualquier nombre daría error.
     */
    public function getTimeRelativeAttribute(){
        /*El locale lo convierte a español*/
        return Carbon::parse($this->created_at)->locale('es')->diffForHumans();
    }
}
