<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;

class NotificationComponent extends Component
{
    public function render()
    {
        $this->notificationtime = Carbon::today();
        return view('livewire.admin.notification-component')->layout('layouts.master');
    }
}
