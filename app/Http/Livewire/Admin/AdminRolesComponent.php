<?php

namespace App\Http\Livewire\Admin;

use DB;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Notification;

class AdminRolesComponent extends Component
{


    public function deleteRole($id)
    {
        DB::table("roles")->where('id',$id)->delete();


        $user = User::findOrFail(Auth::user()->id)->first();
        $delete_role = Role::latest()->first();
        Notification::send($user, new \App\Notifications\Delete_Role($delete_role));
        session()->flash('success_message','Role has been deleted successfully!');
        return redirect(route('admin.roles'));
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.admin.admin-roles-component',['roles'=>$roles])->layout('layouts.master');
    }
}
