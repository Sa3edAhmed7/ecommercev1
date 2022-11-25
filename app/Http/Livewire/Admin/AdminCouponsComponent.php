<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    public function deleteCoupon($id)
    {
        $coupon =  Coupon::findOrFail($id);
        $coupon->delete();
        session()->flash('success_message','Coupon has been deleted successfully!');
    }

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
