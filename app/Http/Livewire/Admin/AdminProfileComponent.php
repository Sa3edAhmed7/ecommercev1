<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminProfileComponent extends Component
{
    public function render()
    {
        $userProfile = Profile::where('user_id',Auth::user()->id)->first();
        if(!$userProfile)
        {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }

        $user = User::find(Auth::user()->id);

        return view('livewire.admin.admin-profile-component',['user'=>$user])->layout('layouts.master');
    }
}
