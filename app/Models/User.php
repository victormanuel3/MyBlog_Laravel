<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /*Relacion uno a muchos hasMany
    $this->hasMany(
    Modelo a relacionar, 
    foreign key(Laravel cuenta con uan convención que intuye que la foreign key es modelo actual_id),
    primary key(Laravel intuye que es id);
    )
    */
    public function posts(){
        return $this->hasMany(Post::class);
    }
    /* --------------------------------------------------------------------------------------------- */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /* -------------------------------------------------------------------------------------------- */
    public function likes() {
        // Un usuario le ha dado like a varios posts.
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
