<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Http\Requests\DateCheckinValidate;
use App\Notification;
use App\Notifications\RepliedToThread;
use App\Order;
use App\StatusInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TJGazel\Toastr\Facades\Toastr;

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
        $totalDayRent = Carbon::create($checkin)->diffInDays(Carbon::create($checkout));

        $orders = Order::where('house_id',$house_id)->get();
        foreach ($orders as $order) {
            if (
                (Carbon::parse($checkin)->timestamp >= Carbon::parse($order->checkin)->timestamp
                    && Carbon::parse($checkin)->timestamp <= Carbon::parse($order->checkout)->timestamp) ||

                (Carbon::parse($checkout)->timestamp >= Carbon::parse($order->checkin)->timestamp
                    && Carbon::parse($checkout)->timestamp <= Carbon::parse($order->checkout)->timestamp) ||

                (Carbon::parse($checkin)->timestamp <= Carbon::parse($order->checkin)->timestamp
                    && Carbon::parse($checkout)->timestamp >= Carbon::parse($order->checkout)->timestamp)) {

                Toastr::error('You can\'t rent at this time!');
                return redirect()->route('home');
            }
        }
        $order = new Order();
        $order->user_id = Auth::id();
        $order->house_id = $house_id;
        $order->status = StatusInterface::PENDING;
        $order->checkin = $checkin;
        $order->checkout = $checkout;
        $order->totalPrice = ($totalDayRent * $request->price);
        $order->save();
        $order_id = DB::table('orders')->max('id');

        \auth()->user()->notify(new RepliedToThread($email, $title, $checkin, $checkout, $house_id,$order_id));
        \TJGazel\Toastr\Facades\Toastr::success('Send request success!');
        return redirect()->route('home', compact('cities', 'houses'));

    }
}
