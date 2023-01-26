<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Mail\TestMail;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class AdminChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);
    }
    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();

            $users = User::findOrFail(Auth::user()->id)->first();
            $change_password = User::latest()->first();
            Notification::send($users, new \App\Notifications\Change_Password($change_password));

            session()->flash('password_success','Password has been changed successfully!');
        }
        else
        {
            session()->flash('password_error','Password does not match!');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-change-password-component')->layout('layouts.master');
    }
}
