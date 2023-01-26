<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' =>  'required|unique:categories'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' =>  'required|unique:categories'
        ]);

        if($this->category_id)
        {
            $category = new Subcategory();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->category_id = $this->category_id;
            $category->save();
        }
        else
        {
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();

            $user = User::findOrFail(Auth::user()->id)->first();
            $change_password = Category::latest()->first();
            Notification::send($user, new \App\Notifications\Add_Category($change_password));
        }
        session()->flash('success_message','Category has been created successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-category-component',['categories'=>$categories])->layout('layouts.master');
    }
}
