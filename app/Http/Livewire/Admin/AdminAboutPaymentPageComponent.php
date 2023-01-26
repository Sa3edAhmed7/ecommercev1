<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\AboutPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminAboutPaymentPageComponent extends Component
{
    public $freeshipping;
    public $guarantee;

    public function mount()
    {
        $aboutpay = AboutPayment::find(1);
        if($aboutpay)
        {
            $this->freeshipping = $aboutpay->freeshipping;
            $this->guarantee = $aboutpay->guarantee;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'freeshipping' => 'required',
            'guarantee' => 'required',
        ]);
    }

    public function saveAboutPayment()
    {
        $this->validate([
            'freeshipping' => 'required',
            'guarantee' => 'required',
        ]);

        $aboutpay = AboutPayment::find(1);
        if(!$aboutpay)
        {
            $aboutpay = new AboutPayment();
        }
            $aboutpay->freeshipping = $this->freeshipping;
            $aboutpay->guarantee = $this->guarantee;
            $aboutpay->save();

        $user = User::findOrFail(Auth::user()->id)->first();
        $about_payment = AboutPayment::latest()->first();
        Notification::send($user, new \App\Notifications\About_Payment($about_payment));

            session()->flash('message','AboutPayment has been saved successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-about-payment-page-component')->layout('layouts.master');
    }
}
