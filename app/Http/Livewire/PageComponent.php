<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;

class PageComponent extends Component
{
    public $title;
    public $content;
    
    public function mount($title)
    {
        $this->title = $title;
    }
    public function render()
    {
        $page = Page::where('title',$this->title)->first();
        return view('livewire.page-component',['page'=>$page])->layout('layouts.base');
    }
}
