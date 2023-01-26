<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'subtitle' =>  'required',
            'price' =>  'required',
            'link' =>  'required',
            'status' =>  'required',
        ]);

        if($this->newimage)
        {
            $this->validateOnly($fields,[
            'newimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }
    }

    public function mount($slide_id)
    {
        $slider = HomeSlider::findOrFail($slide_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
    }

    public function updateSlider()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' =>  'required',
            'price' =>  'required',
            'link' =>  'required',
            'status' =>  'required',
        ]);

        if($this->newimage)
        {
            $this->validate([
            'newimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        $slider = HomeSlider::findOrFail($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        if($this->newimage)
        {
            $imageName = uniqid() . '_' . time() . '_' . $this->newimage->getClientOriginalName();
            $this->newimage->storeAs('sliders',$imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status;
        $slider->save();


        $user = User::findOrFail(Auth::user()->id)->first();
        $edit_slide = HomeSlider::latest()->first();
        Notification::send($user, new \App\Notifications\Edit_Slide($edit_slide));
        session()->flash('success_message','Slider has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.master');
    }
}
