<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class AdminOrderComponent extends Component
{
    use WithPagination;
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
        session()->flash('order_mssage','Order status has been updated successfully!');
    }
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
