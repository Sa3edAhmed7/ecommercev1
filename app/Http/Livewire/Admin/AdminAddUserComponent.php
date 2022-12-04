<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Hash;

class AdminAddUserComponent extends Component
{
    
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $utype;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' =>  'required|string|email|max:255|unique:users',
            'password' =>  'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
            'utype' =>  'required',
        ]);
    }

    public function storeUser()
    {
        $this->validate([
            'name' => 'required',
            'email' =>  'required|string|email|max:255|unique:users',
            'password' =>  'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
            'utype' =>  'required',
        ]);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->password_confirmation = Hash::make($this->password_confirmation);
        $user->utype = $this->utype;
        $user->save();
        session()->flash('success_message','User has been created successfully!');
        return redirect()->route('admin.users');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-user-component')->layout('layouts.base');
    }
}
