<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    public $message = 'Dios te ama';

    public function render()
    {
        return view('livewire.home-component');
    }
}
