<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount()
    {
        $sale = Sale::find(1);
        $this->sale_date = $sale->sale_date;
        $this->status = $sale->status;
    }

    public function updateSale()
    {
        $sale = Sale::find(1);
        $sale->sale_date = $this->sale_date;
        $sale->status = $this->status;
        $sale->save();


        $user = User::findOrFail(Auth::user()->id)->first();
        $sale_setting = Sale::latest()->first();
        Notification::send($user, new \App\Notifications\Sale_Setting($sale_setting));
        session()->flash('success_message','Record has been updated successfully!');
        return redirect(route('admin.dashboard'));
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.master');
    }
}
