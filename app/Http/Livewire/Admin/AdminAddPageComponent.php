<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Livewire\Component;

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
        session()->flash('success_message','Page has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-page-component')->layout('layouts.base');
    }
}
