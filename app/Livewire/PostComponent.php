<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public $post;
    public function mount($id) {
        $this->post = Post::where('id',$id)->first();

    }
    public function render()
    {
        return view('livewire.post-component', ['post' => $this->post]);
    }
}
