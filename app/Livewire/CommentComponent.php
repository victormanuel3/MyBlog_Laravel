<?php

namespace App\Livewire;

use Livewire\Component;

class CommentComponent extends Component
{
    public $comment;  // Recibe el comentario

    public $visibleReplies = [];  // Visibilidad de las respuestas.

    public function mount($comment)
    {
        $this->comment = $comment;  // Asignamos el comentario recibido
    }

    public function toggleReplies($commentId)
    {
        // Si la clave no existe, inicializamos con un valor por defecto (false).
        if (!isset($this->visibleReplies[$commentId])) {
            $this->visibleReplies[$commentId] = false; // o true, dependiendo de lo que quieras hacer.
        }
    
        // Alternamos la visibilidad de las respuestas.
        $this->visibleReplies[$commentId] = !$this->visibleReplies[$commentId];
    }

    public function render()
    {
        return view('livewire.comment-component');
    }
}
