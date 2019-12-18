<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Http\Requests\DateCheckinValidate;
use App\Notification;
use App\Notifications\RepliedToThread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TJGazel\Toastr\Toastr;

class OrderController extends Controller
{
    public function RentHouse(DateCheckinValidate $request)
    {
        $cities = City::all();
        $houses = House::all();
        if (auth()->user()) {
            $count = 0;
            foreach (\App\Notification::all() as $notice) {
                if (json_decode($notice->data)->receiver == auth()->user()->email) {
                    $count++;
                }
            }
        }
        $email = $request->email;
        $title = $request->title;
        $checkin = $request->checkin;
        $checkout = $request->checkout;
        $house_id = $request->house_id;

        \auth()->user()->notify(new RepliedToThread($email, $title, $checkin, $checkout, $house_id));
        \TJGazel\Toastr\Facades\Toastr::success('Gửi yêu cầu thuê nhà thành công!');
        return redirect()->route('home', compact('cities', 'houses','count'));
    }
}
