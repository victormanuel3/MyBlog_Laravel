<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $count = 0;

    //Reglas de validación para el formulario de login
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {        
        // dd($this->email, $this->password);
        // Validar el formulario automáticamente con las reglas definidas arriba
        $this->validate();
        
        //Esto es un objecto con los datos del primero usuario con ese email.
        $user = User::where('email', $this->email)->first();

        //Aquí comprobamos sí el usuario existe y la contraseña que puso es igual a la de 
        //la base de datos hasheada.
        if($user && Hash::check($this->password, $user->password)){
            Auth::login(user: $user);
            return redirect()->route('blog');
        }else {
             session()->flash('error', 'Las credenciales son incorrectas.');
        }
    }

    public function render(){
        return view('livewire.login');
    }
}
