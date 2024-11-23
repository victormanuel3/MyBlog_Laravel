<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        // Obtener los posts desde la base de datos
        $posts = Post::all();
        return view('livewire.blog', compact('posts'));
    }
}
