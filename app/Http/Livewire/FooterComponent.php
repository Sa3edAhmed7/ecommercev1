<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\LinkApp;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Category;
use App\Models\AboutPayment;
use Livewire\WithPagination;

class FooterComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $setting = Setting::findOrFail(1);
        $aboutpay = AboutPayment::findOrFail(1);
        $linkapp = LinkApp::findOrFail(1);
        $pages = Page::all();
        $categories = Category::inRandomOrder()->limit(9)->get();
        return view('livewire.footer-component',['setting'=>$setting ,'pages'=>$pages,'categories'=>$categories,'aboutpay'=>$aboutpay,'linkapp'=>$linkapp]);
    }
}
