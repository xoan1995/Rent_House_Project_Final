<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function RentHouse(Request $request)
    {
//        $checkin = $request->checkin;
//        $checkout = $request->checkout;
        return view('home',compact('user'));
    }
}
