<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\WithPagination;


class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function deleteCategory($id)
    {
        $category =  Category::findOrFail($id);
        $category->delete();
        session()->flash('success_message','Category has been deleted successfully!');
    }
    public function deleteSubcategory($id)
    {
        $category =  Subcategory::findOrFail($id);
        $category->delete();
        session()->flash('success_message','Subcategory has been deleted successfully!');
    }
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
