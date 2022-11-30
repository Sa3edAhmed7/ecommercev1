<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminAddUserComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-add-user-component')->layout('layouts.base');
    }
}
