<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;

class HeaderComponent extends Component
{
    public function render()
    {
        $pages = Page::all();
        return view('livewire.header-component',['pages'=>$pages]);
    }
}
