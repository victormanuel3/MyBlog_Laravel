<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostComponent extends Component
{
    public $post;
    public $body;
    public $comments;

    protected $rules = [
        'body' => 'required'
    ];

    public function mount($id) {
        $this->post = Post::where('id',$id)->first();
        $this->comments = $this->post->comments;
    }
    
    public function comment() {
        $this->validate();
        
        Comment::create([
            'body' => $this->body,
            'user_id' => Auth::user()->id,
            'commentable_id' => $this->post->id,
            'commentable_type' => Post::class,
        ]);
        
        $this->body = '';
    }
    
    public function render(){
        $this->comments = $this->post->comments;
        return view('livewire.post-component', [
            'post' => $this->post,
            'comments' => $this->comments
        ]);
    }
}
