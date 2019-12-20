<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Http\Requests\DateCheckinValidate;
use App\Notification;
use App\Notifications\RepliedToThread;
use App\Order;
use App\StatusInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TJGazel\Toastr\Toastr;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function RentHouse(DateCheckinValidate $request)
    {
        $cities = City::all();
        $houses = House::all();
        $email = $request->email;
        $title = $request->title;
        $checkin = $request->checkin;
        $checkout = $request->checkout;
        $house_id = $request->house_id;

        $order = new Order();
        $order->user_id = Auth::id();
        $order->house_id = $house_id;
        $order->status = StatusInterface::PENDING;
        $order->checkin = $checkin;
        $order->checkout = $checkout;

        $order->save();

        \auth()->user()->notify(new RepliedToThread($email, $title, $checkin, $checkout, $house_id));
        \TJGazel\Toastr\Facades\Toastr::success('Send request success!');
        return redirect()->route('home', compact('cities', 'houses'));
    }
}
