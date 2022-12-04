<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Hash;

class AdminEditUserComponent extends Component
{
    public $name;
    public $email;
    public $utype;
    public $user_id;

    public function mount($user_id) 
    {
        $user = User::where('id',$user_id)->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->utype = $user->utype;
        $this->user_id = $user->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' =>  'required|string|email|max:255',
            'utype' =>  'required',
        ]);
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'email' =>  'required|string|email|max:255',
            'utype' =>  'required',
        ]);
        $user = User::findOrFail($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->utype = $this->utype;
        $user->save();
        session()->flash('success_message','User has been Updated successfully!');
        return redirect()->route('admin.users');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-user-component')->layout('layouts.base');
    }
}
