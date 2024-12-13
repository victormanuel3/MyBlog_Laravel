<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Blog extends Component
{
    public $search = '';
    public $posts;
    
    public function updatingSearch()  {
        $this->posts = Post::where(
            'title',
            'like',
            "%{$this->search}%"
        )->orWhereHas('categories', function ($query) {
            $query->where(
                'category',
                'like',
                "%{$this->search}%"
            );
        })->orderBy('title')->get();
    }

    public function render(){
        //Datos del usuario autenticado
        $user = Auth::user();
        if ($this->search == ''){
            $this->posts = Post::all();
        }
        //usar el mount;
        return view('livewire.blog', ['posts' => $this->posts, 'user'=>$user]);
    }
}


