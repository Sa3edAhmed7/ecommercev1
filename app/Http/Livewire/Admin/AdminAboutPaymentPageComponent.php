<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\AboutPayment;

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
            session()->flash('message','AboutPayment has been saved successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-about-payment-page-component')->layout('layouts.base');
    }
}
