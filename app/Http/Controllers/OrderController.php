<?php

namespace App\Http\Controllers;

use App\Notifications\RepliedToThread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function RentHouse(Request $request)
    {
        \auth()->user()->notify(new RepliedToThread());
//        return view('home',compact('user'));
    }
}
