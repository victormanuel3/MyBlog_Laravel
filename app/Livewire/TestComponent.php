<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TestComponent extends Component
{
    public $users;
    public $newName = 'Victor';
    public User $user;

    public function mount(){
        $this->user = User::find(11);
        // dd($this->user->name);

        $this->update();
    }
    public $count = 19;

    public function incrementar(){
        // dd(1);
        $this->count++;
    }
    public function render(){
        return view('livewire.test-component');
    }

    public function update(){
        $this->user->name = $this->newName;
        $this->user->save();
        dd($this->user->name);
    }
}
