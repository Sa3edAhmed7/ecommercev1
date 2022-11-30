<?php

namespace App\Http\Livewire\Admin;

use App\Models\LinkApp;
use Livewire\Component;

class AdminLinkAppComponent extends Component
{
    public $googleplay;
    public $appstore;

    public function mount()
    {
        $linkapp = LinkApp::findOrFail(1);
        if($linkapp)
        {
            $this->googleplay = $linkapp->googleplay;
            $this->appstore = $linkapp->appstore;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'googleplay' => 'required',
            'appstore' => 'required',
        ]);
    }

    public function saveLinkApp()
    {
        $this->validate([
            'googleplay' => 'required',
            'appstore' => 'required',
        ]);

        $linkapp = LinkApp::findOrFail(1);
        if(!$linkapp)
        {
            $linkapp = new LinkApp();
        }
            $linkapp->googleplay = $this->googleplay;
            $linkapp->appstore = $this->appstore;
            $linkapp->save();
            session()->flash('message','LinkApp has been saved successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-link-app-component')->layout('layouts.base');
    }
}
