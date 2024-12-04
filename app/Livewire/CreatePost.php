<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class CreatePost extends ModalComponent
{
    public $title, $subtitle, $content, $editMode = false;
    public Post $post;

    protected $rules = [
        'title' => 'required|max:64', /*length: 64*/
        'subtitle' => 'required',
        'content' => 'required'
    ];

    public function mount($post = null){
        if ($post) {
            $this->editMode = true;
        }
    }
    public function create_post(){
        // Validar el formulario automáticamente con las reglas definidas arriba
        $this->validate();

        Post::create([
            'title'=>$this->title,
            'subtitle'=>$this->subtitle,
            'content'=>$this->content,
            'user_id'=>Auth::user()->id
        ]);

        return redirect()->route('user.profile');
    }
    
    public function modify_post() {
        $this->validate();

        $this->post->title = $this->title;
        $this->post->subtitle = $this->subtitle;
        $this->post->content = $this->content;

        $this->post->save();

        return redirect()->route('user.profile');
    }

    public function render(){
        return view('livewire.create-post', [
            'editMode' => $this->editMode
        ]);
    }
}
