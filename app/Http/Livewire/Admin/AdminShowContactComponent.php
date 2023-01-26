<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class AdminShowContactComponent extends Component
{
    public function mount($id)
    {
        $contact = Contact::where('id',$id)->first();
        $this->id = $contact->id;
    }

    public function render()
    {
        $contact =  Contact::findOrFail($this->id);
        return view('livewire.admin.admin-show-contact-component',['contact'=>$contact])->layout('layouts.master');
    }
}
