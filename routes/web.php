<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Blog;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;


//-------------------------------------------------------------------
Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get(uri: '/blog', action: [Blog::class, 'render'])->middleware(['auth', 'verified'])->name('blog');

Route::get('/login', action: [Login::class, 'render'])->name('login.test');


//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Ruta para logout (desloguear al usuario)
//Route::post('/logout', function () {
//    Auth::logout();
//    return redirect()->route('home');
//})->name('logout');

// require __DIR__.'/auth.php';
