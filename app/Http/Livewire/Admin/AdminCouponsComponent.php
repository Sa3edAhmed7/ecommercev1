<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminCouponsComponent extends Component
{
    public function deleteCoupon($id)
    {
        $coupon =  Coupon::findOrFail($id);
        $coupon->delete();


        $user = User::findOrFail(Auth::user()->id)->first();
        $delete_coupon = Coupon::latest()->first();
        Notification::send($user, new \App\Notifications\Delete_Coupon($delete_coupon));
        session()->flash('success_message','Coupon has been deleted successfully!');
    }

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons])->layout('layouts.master');
    }
}
