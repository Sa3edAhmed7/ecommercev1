<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminPageComponent extends Component
{
    use WithPagination;
    public $searchTearm;

    public function deletePage($id)
    {
        $page =  Page::findOrFail($id);
        Page::where('id', $page->id)->delete();


        $user = User::findOrFail(Auth::user()->id)->first();
        $delete_page = Page::latest()->first();
        Notification::send($user, new \App\Notifications\Delete_Page($delete_page));
        session()->flash('success_message','Page has been deleted successfully!');
    }

    public function render()
    {
        $search = '%' . $this->searchTearm . '%';
        $pages = Page::where('title','LIKE',$search)
        ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-page-component',['pages'=>$pages])->layout('layouts.master');
    }
}
