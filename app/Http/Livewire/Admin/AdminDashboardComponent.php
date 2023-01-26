<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
class AdminDashboardComponent extends Component
{
    public $searchTearm;
    public function render()
    {
        
        $totalSales = Order::where('status','delivered')->count();
        $totalRevenue = Order::where('status','delivered')->sum('total');
        $todaySales = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayRevenue = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');

        $search = '%' . $this->searchTearm . '%';
        $orders = Order::where('created_at','LIKE',$search)
        ->orWhere('email','LIKE',$search)
        ->orWhere('mobile','LIKE',$search)
        ->orderBy('id','DESC')->get()->take(10);
        
        return view('livewire.admin.admin-dashboard-component',[
            'orders'=>$orders,
            'totalSales'=>$totalSales,
            'totalRevenue'=>$totalRevenue,
            'todaySales'=>$todaySales,
            'todayRevenue'=>$todayRevenue
        ])->layout('layouts.master');
    }
}
