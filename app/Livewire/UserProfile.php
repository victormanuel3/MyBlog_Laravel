<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfile extends Component
{
    public function deletePost(int $idPost){
        $post = Post::find($idPost);
        if($post && $post->user_id == Auth::id()){
            $post->delete();
        }
    }
    public function render(){
        $user = Auth::user();
        $posts = $user->posts; //Estudiar hasMany
        $count_posts = $posts->count();
        
        return view('livewire.user-profile',[
            'user'=>$user,
            'posts'=>$posts,
            'postAmount'=>$count_posts
        ]);
    }
}
