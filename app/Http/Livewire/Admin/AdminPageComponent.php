<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPageComponent extends Component
{
    use WithPagination;
    public $searchTearm;

    public function deletePage($id)
    {
        $page =  Page::findOrFail($id);
        Page::where('id', $page->id)->delete();
        session()->flash('success_message','Page has been deleted successfully!');
    }

    public function render()
    {
        $search = '%' . $this->searchTearm . '%';
        $pages = Page::where('title','LIKE',$search)
        ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-page-component',['pages'=>$pages])->layout('layouts.base');
    }
}
