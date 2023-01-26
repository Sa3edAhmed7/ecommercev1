<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminSettingUserComponent extends Component
{

    public function deleteUser($id)
    {
        $users =  User::findOrFail($id);
        if($users->image)
        {
            unlink(public_path('assets/images/profile'.'/'.$users->image));
        }
            User::where('id', $users->id)->delete();


        $user = User::findOrFail(Auth::user()->id)->first();
        $delete_user = User::latest()->first();
        Notification::send($user, new \App\Notifications\Delete_User($delete_user));
        session()->flash('delete_message','User has been deleted successfully!');
        return redirect(route('admin.users'));
    }


    public function render()
    {
        $users = User::all();
        return view('livewire.admin.admin-setting-user-component',['users'=>$users])->layout('layouts.master');
    }
}
