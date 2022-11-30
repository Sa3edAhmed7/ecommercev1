<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

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
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' =>  'required',
        ]);
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
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' =>  'required',
        ]);
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
        session()->flash('success_message','Slider has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
