<?php


use App\Livewire\Blog;
use App\Livewire\PostComponent;
use App\Livewire\TestComponent;
use App\Livewire\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/test', TestComponent::class)->name('test');

Route::view('/', view: 'home')->name('home');

Route::middleware('auth')->group(function(){
    Route::get(uri: '/blog', action: Blog::class)->name('blog');
    Route::get(uri: '/blog/profile',action:UserProfile::class)->name('user.profile');
    Route::get(uri: '/blog/post/{id}',action:PostComponent::class)->name('blog.post');
});







// Ruta para logout (desloguear al usuario)
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('/');
})->name('logout');