<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Mail\TestMail;
use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required'
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();

        $user = User::findOrFail(Auth::user()->id)->first();
        $message_contact = Contact::latest()->first();
        Notification::send($user, new \App\Notifications\Messages($message_contact));

        Mail::to($contact->email)->send(new TestMail($contact));
        session()->flash('message','Thanks, Your message has been sent successfully!');
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.contact-component',['setting'=>$setting])->layout('layouts.base');
    }
}
