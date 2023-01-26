<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminEditAttributesComponent extends Component
{
    public $name;
    public $attribute_id;

    public function mount($attribute_id)
    {
        $pattribute = ProductAttribute::findOrFail($attribute_id);
        $this->attribute_id = $pattribute->id;
        $this->name = $pattribute->name;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            "name" => "required"
        ]);
    }

    public function updateAttribute()
    {
        $this->validate([
            "name" => "required"
        ]);

        $pattribute = ProductAttribute::findOrFail($this->attribute_id);
        $pattribute->name = $this->name;
        $pattribute->save();


        $user = User::findOrFail(Auth::user()->id)->first();
        $edit_attribute = ProductAttribute::latest()->first();
        Notification::send($user, new \App\Notifications\Edit_Attribute($edit_attribute));

        session()->flash('message','Attribute has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-attributes-component')->layout('layouts.master');
    }
}
