<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminEditPageComponent extends Component
{
    public $title;
    public $content;
    public $page_id;
    public function mount($title)
    {
        $page = Page::where('title',$title)->first();
        $this->title = $page->title;
        $this->content = $page->content;
        $this->page_id = $page->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'content' =>  'required',
        ]);
    }

    public function updatePage()
    {
        $this->validate([
            'title' => 'required',
            'content' =>  'required',
        ]);

        $page = Page::findOrFail($this->page_id);
        $page->title = $this->title;
        $page->content = $this->content;
        $page->save();


        $user = User::findOrFail(Auth::user()->id)->first();
        $edit_page = Page::latest()->first();
        Notification::send($user, new \App\Notifications\Edit_Page($edit_page));
        session()->flash('success_message','Page has been Updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-page-component')->layout('layouts.master');
    }
}
