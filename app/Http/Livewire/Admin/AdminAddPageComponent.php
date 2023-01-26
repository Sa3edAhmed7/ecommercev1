<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminAddPageComponent extends Component
{
    public $title;
    public $content;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'content' => 'required',
        ]);
    }

    public function storePage()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $page = new Page();
        $page->title = $this->title;
        $page->content = $this->content;
        $page->save();


        $user = User::findOrFail(Auth::user()->id)->first();
        $add_page = Page::latest()->first();
        Notification::send($user, new \App\Notifications\Add_Page($add_page));
        session()->flash('success_message','Page has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-page-component')->layout('layouts.master');
    }
}
