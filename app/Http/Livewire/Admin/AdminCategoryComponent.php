<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();


        $user = User::findOrFail(Auth::user()->id)->first();
        $delete_category = Category::latest()->first();
        Notification::send($user, new \App\Notifications\Delete_Category($delete_category));
        session()->flash('success_message','Category has been deleted successfully!');
    }

    public function destroySubcategory($id)
    {
        Subcategory::findOrFail($id)->delete();
        session()->flash('success_message','Subcategory has been deleted successfully!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.master');
    }
}
