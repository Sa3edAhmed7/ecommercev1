<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminAddAttributesComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            "name" => "required"
        ]);
    }

    public function storeAttribute()
    {
        $this->validate([
            "name" => "required"
        ]);

        $pattribute = new ProductAttribute();
        $pattribute->name = $this->name;
        $pattribute->save();

        $user = User::findOrFail(Auth::user()->id)->first();
        $add_attribute = ProductAttribute::latest()->first();
        Notification::send($user, new \App\Notifications\Add_Attribute($add_attribute));
        session()->flash('message','Attribute has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-attributes-component')->layout('layouts.master');
    }
}
