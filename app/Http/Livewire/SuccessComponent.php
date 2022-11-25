<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SuccessComponent extends Component
{
    public function render()
    {
        return view('livewire.thank-you-component')->layout('layouts.base');
    }
}
