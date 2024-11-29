<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class CreatePost extends ModalComponent
{
    public $title, $subtitle, $content;
    public function create_post(){
        Post::create([
            'title'=>$this->title,
            'subtitle'=>$this->subtitle,
            'content'=>$this->content,
            'user_id'=>Auth::user()->id
        ]);
        // return redirect()->route('blog');
        $this->closeModal();
    }
    
    public function render(){
        return view('livewire.create-post');
    }
}
