<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->unreadNotifications()->update(['read_at' => Carbon::now()]);
        return redirect()->back();
    }
}
