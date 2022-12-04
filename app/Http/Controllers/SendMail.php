<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class SendMail extends Controller
{
    public function SendMail(Request $request)
    {
        $data = [];
        Mail::to(Auth::user()->email)->send(new TestMail($data));
        return "Email Message has been sent Done";
    }
}
