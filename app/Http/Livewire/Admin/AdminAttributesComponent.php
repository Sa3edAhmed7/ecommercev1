<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminAttributesComponent extends Component
{
    public function deleteAttribute($attribute_id)
    {
        $pattribute = ProductAttribute::findOrFail($attribute_id);
        $pattribute->delete();


        $user = User::findOrFail(Auth::user()->id)->first();
        $delete_attribute = ProductAttribute::latest()->first();
        Notification::send($user, new \App\Notifications\Delete_Attribute($delete_attribute));

        session()->flash('message','Attribute has been deleted successfully!');
    }
    public function render()
    {
        $pattributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attributes-component',['pattributes'=>$pattributes])->layout('layouts.master');
    }
}
