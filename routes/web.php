<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Blog;
use App\Livewire\CreatePost;
use App\Livewire\Login;
use App\Livewire\TestComponent;
use App\Livewire\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//-------------------------------------------------------------------

Route::get('/test', TestComponent::class)->name('test');

Route::view('/home', 'home')->name('home');

Route::middleware('auth')->group(function(){
    Route::get(uri: '/blog', action: Blog::class)->name('blog');
    Route::get(uri: '/blog/create',action: CreatePost::class)->name('post.create');
    Route::get(uri: '/blog/profile',action:UserProfile::class)->name('user.profile');
});

Route::get('/login', action: Login::class)->middleware('guest')->name('login');

// Ruta para logout (desloguear al usuario)
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




// require __DIR__.'/auth.php';
