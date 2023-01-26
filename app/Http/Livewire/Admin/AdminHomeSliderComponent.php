<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($id)
    {
        $slider =  HomeSlider::findOrFail($id);
        unlink(public_path('assets/images/sliders'.'/'.$slider->image));
        HomeSlider::where('id', $slider->id)->delete();


        $user = User::findOrFail(Auth::user()->id)->first();
        $delete_slide = HomeSlider::latest()->first();
        Notification::send($user, new \App\Notifications\Delete_Slide($delete_slide));
        session()->flash('success_message','Slider has been deleted successfully!');
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.master');
    }
}
