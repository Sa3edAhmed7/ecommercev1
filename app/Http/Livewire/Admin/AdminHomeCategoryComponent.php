<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofproducts;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->sel_categories);
        $this->numberofproducts = $category->no_of_products;
    }
    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',',$this->selected_categories);
        $category->no_of_products = $this->numberofproducts;
        $category->save();


        $user = User::findOrFail(Auth::user()->id)->first();
        $home_category = HomeCategory::latest()->first();
        Notification::send($user, new \App\Notifications\Manage_Categories($home_category));
        session()->flash('success_message','HomeCategory has been updated successfully!');
        return redirect(route('admin.dashboard'));
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component',['categories'=>$categories])->layout('layouts.master');
    }
}
