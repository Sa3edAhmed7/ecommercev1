<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSettingUserComponent extends Component
{
    use WithPagination;
    public $searchTearm;

    public function deleteUser($id)
    {
        $users =  User::findOrFail($id);
        if($users->image)
        {
            unlink(public_path('assets/images/profile'.'/'.$users->image));
        }
            User::where('id', $users->id)->delete();
        session()->flash('success_message','User has been deleted successfully!');
    }

        
    public function render()
    {
        $search = '%' . $this->searchTearm . '%';
        $users = User::where('name','LIKE',$search)
        ->orWhere('email','LIKE',$search)
        ->orWhere('utype','LIKE',$search)
        ->orWhere('id','LIKE',$search)
        ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-setting-user-component',['users'=>$users])->layout('layouts.base');
    }
}
