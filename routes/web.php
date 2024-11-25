<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Blog;
use App\Livewire\Login;
use App\Livewire\TestComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//-------------------------------------------------------------------
Route::get('/test', TestComponent::class)->name('test');

Route::view('/home', 'home')->name('home');

Route::get(uri: '/blog', action: [Blog::class, 'render'])->middleware(middleware: 'auth')->name('blog');

Route::get('/login', action: Login::class)->middleware('guest')->name('login');

// Ruta para logout (desloguear al usuario)
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');




//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// require __DIR__.'/auth.php';
