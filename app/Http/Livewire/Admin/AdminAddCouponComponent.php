<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code' => 'required|unique:coupons',
            'type' =>  'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
    }
    public function storeCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' =>  'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();


        $user = User::findOrFail(Auth::user()->id)->first();
        $add_coupon = Coupon::latest()->first();
        Notification::send($user, new \App\Notifications\Add_Coupon($add_coupon));
        session()->flash('success_message','Coupon has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.master');
    }
}
