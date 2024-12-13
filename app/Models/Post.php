<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
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

    /*
    RELACIONES POLIMÓRFICAS -------------------------
    Un post puede tener muchos comentarios
    Primer parámetro: Especifíca que esta relación está conectada con el modelo Comment,
                      Es decir al hacer un $post->comments, Laravel buscará en la tabla comments.

    Segundo parámetro: Alias o término que Laravel usará para mapear las columnas commentable_type y
                       commentable_id, Laravel buscará en la tabla comments registros donde:
                       commentable_type = 'App\Models\Post' (el modelo actual).
                       commentable_id = $post->id (el ID del registro actual de Post).
    */
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
    /* 
    NOTA: Si en el segundo parámetro por ejemplo pongo drawable en vez de commentable, Laravel buscaría
    columnas llamadas drawable_id y drawable_type en la tabla relacionada debido a que laravel contruye
    los nombres de las columnas basándose en este parámetro.

    Laravel añade los sufijos _id y _type por una convención que él tiene para crear los nombres de las 
    columnas.

    Si usas 'commentable', Laravel espera encontrar:
    commentable_type
    commentable_id

    -------> si no usas _able laravel no busca solo debes añadir las columas como parámetros.
    */

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
