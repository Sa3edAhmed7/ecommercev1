<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($id)
    {
        $slider =  HomeSlider::findOrFail($id);
        unlink(public_path('assets/images/sliders'.'/'.$slider->image));
        HomeSlider::where('id', $slider->id)->delete();
        session()->flash('success_message','Slider has been deleted successfully!');
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
