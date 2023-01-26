<?php

namespace App\Http\Livewire\Admin;

use DB;
use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminOrderComponent extends Component
{
    public $searchTearm;
    public function updateOrderStatus($order_id,$status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }

        $order->save();


        $user = User::findOrFail(Auth::user()->id)->first();
        $update_orders = Order::latest()->first();
        Notification::send($user, new \App\Notifications\Update_Orders($update_orders));
        session()->flash('order_message','Order status has been updated successfully!');
    }
    public function render()
    {
        $search = '%' . $this->searchTearm . '%';
        $orders = Order::where('created_at','LIKE',$search)
        ->orWhere('email','LIKE',$search)
        ->orWhere('mobile','LIKE',$search)
        ->orderBy('id','DESC')->get()->take(10);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.master');
    }
}
