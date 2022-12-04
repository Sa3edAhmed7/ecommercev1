<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AdminEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $mobile;
    public $image;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $newimage;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->profile->mobile;
        $this->image = $user->profile->image;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->city = $user->profile->city;
        $this->province = $user->profile->province;
        $this->country = $user->profile->country;
        $this->zipcode = $user->profile->zipcode;
    }

    public function updateProfile()
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $this->name;
        
        if($this->newimage)
        {
            if($this->image)
            {
                unlink(public_path('assets/images/profile'.'/'.$this->image));
            }
            $imageName = $user->id.'/'.uniqid() . '_' . time() . '_' . $this->newimage->getClientOriginalName();
            $this->newimage->storeAs('profile',$imageName);
            $user->profile->image = $imageName;
            $user->profile_photo_path = $imageName;
        }

        $user->save();

        $user->profile->mobile = $this->mobile;
        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->city = $this->city;
        $user->profile->province = $this->province;
        $user->profile->country = $this->country;
        $user->profile->zipcode = $this->zipcode;
        $user->profile->save();
        session()->flash('message','Profile has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-profile-component')->layout('layouts.base');
    }
}
