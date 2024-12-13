<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

use function PHPUnit\Framework\isEmpty;

class CreatePost extends ModalComponent
{
    public $title, $subtitle, $content, $categories, $editMode = false;
    public Post $post;

    public $categoriesSelect = [];
    public $selectedCategory = null;
    protected $rules = [
        'title' => 'required|max:64',
        'subtitle' => 'required',
        'content' => 'required',
        'categoriesSelect' => 'required|array|min:1'
    ];

    public function deleteCategory($index) {
        unset($this->categoriesSelect[$index]);
    }

    public function updatedSelectedCategory($value)
    {
        if ($value && !in_array($value, $this->categoriesSelect)) {
            $this->categoriesSelect[] = $value;
        }
        $this->selectedCategory = null;
    }

    public function mount($post = null){
        $this->categories = Category::all();
        if ($post) {
            $this->editMode = true;
        }
        //En livewire:
        //Si hay una propiedad pública de tipo modelo con el mismo nombre del parámetro
        //livewire asigna el parámetro a la propiedad y encuentra la información completa correspondiente
        //Internamente lviewire hace algo como Post::find($parameter).
    }
    public function createPost(){
        // Validar el formulario automáticamente con las reglas definidas arriba
        $this->validate();

        $post = Post::create([
            'title'=>$this->title,
            'subtitle'=>$this->subtitle,
            'content'=>$this->content,
            'user_id'=>Auth::user()->id
        ]);
        // El método attach agrega datos en la tabla intermedia de la relación muchos
        // a muchos, solo recibe id's, se le puede pasar 1 o un array.
        $post->categories()->attach($this->categoriesSelect);
        
        return redirect()->route('user.profile');
    }
    
    public function modifyPost() {
        $this->validate();
        
        $this->post->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content' => $this->content,
        ]);

        $this->post->categories()->sync([$this->categoriesSelect]);
        
        return redirect()->route('user.profile');
    }
    
    public function render(){
        return view('livewire.create-post');
    }
}
