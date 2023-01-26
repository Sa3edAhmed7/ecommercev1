<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'subtitle' =>  'required',
            'price' =>  'required',
            'link' =>  'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' =>  'required',
        ]);
    }
    public function storeSlider()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' =>  'required',
            'price' =>  'required',
            'link' =>  'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' =>  'required',
        ]);
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imageName = uniqid() . '_' . time() . '_' . $this->image->getClientOriginalName();
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();

        $user = User::findOrFail(Auth::user()->id)->first();
        $add_slide = HomeSlider::latest()->first();
        Notification::send($user, new \App\Notifications\Add_Slide($add_slide));
        session()->flash('success_message','Slider has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.master');
    }
}
