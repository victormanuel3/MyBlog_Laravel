<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $count = 19;

    public function incrementar(){
        // dd(1);
        $this->count++;
    }
    public function render(){
        return view('livewire.test-component');
    }
}
