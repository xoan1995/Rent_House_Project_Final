<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\EditUserRequest;
use App\Mail\Reject_rent_house_by_the_host;
use App\Mail\RejectRequestRentHouse;
use App\Order;
use App\StatusInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use TJGazel\Toastr\Facades\Toastr;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    public function editUser()
    {
        $user = Auth::user();
        return view('user.editUser', compact('user'));
    }

    public function update(EditUserRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        if ($request->dob) {
            $user->dob = $request->dob;
        }
        if ($request->idCard) {
            $user->idCard = $request->idCard;
        }
        if ($request->gender) {
            $user->gender = $request->gender;
        }
        if ($request->address) {
            $user->address = $request->address;
        }
        if ($request->phone) {
            $user->phone = $request->phone;
        }
        $user->save();
        Toastr::success('Successfully updated');
        return redirect()->route('home');
    }

    public function viewChangePassword()
    {
        return view('user.changePassword');
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'passwordOld.required' => 'Please enter current password',
            'passwordNew1.required' => 'Please enter password',
        ];
        $validator = Validator::make($data, [
            'passwordOld' => 'required',
            'passwordNew1' => 'required|same:passwordNew1',
            'passwordNew2' => 'required|same:passwordNew1',
        ], $messages);
        return $validator;
    }

    public function changePassword(Request $request)
    {
        if (Auth::check()) {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if ($validator->fails()) {
                Toastr::error('New password does not match');
                return view('user.changePassword');
            } else {
                $current_password = Auth::user()->password;
                if (Hash::check($request_data['passwordOld'], $current_password)) {
                    $user_id = Auth::user()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['passwordNew1']);;
                    $obj_user->save();
                    Toastr::success('Successfully updated');
                    return redirect()->route('home');
                } else {
                    Toastr::error('You have entered the wrong password');
                    return view('user.changePassword');
                }
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function showHousePostedAndBooking()
    {
        $user = Auth::user();
        $totalPrice = $user->orders;
        $totalPriceForMonth = 0;
        for ($i = 0; $i < count($totalPrice); $i++) {
            $totalPriceForMonth += +($totalPrice[$i]->totalPrice);
        }
        $user_id = \auth()->id();
        $houses_posted = House::where('user_id', 'LIKE', $user_id)->get();
        $notifications_booking = \App\Notification::where('notifiable_id', 'LIKE', $user_id)->get();
        $houses_booking = Order::where('user_id', $user_id)->get();

        return view('user.house_posted', compact('houses_posted', 'houses_booking'));
    }

    public function acceptAndSendEmail($id)
    {
        $notification = \App\Notification::where('uid', $id)->get();
        $order_id = json_decode($notification[0]->data)->order_id;
        $houseOrder = null;
        try {
            $houseOrder = Order::findOrFail($order_id);
        } catch (\Exception $exception) {
            Toastr::warning('this house has been canceled for rent!');
        }
        if ($houseOrder) {
            $houseOrder->status = StatusInterface::UNREADY;
            $houseOrder->save();
            $sender = 'tg.bluesky66@gmail.com';
            $receive = json_decode($notification[0]->data)->sender;
            Mail::to($receive)
                ->send(new \App\Mail\RepliedRequestRentHouse($sender));
            Toastr::success('This rental is complete!');
        }
        $notification[0]->delete();
        return back();
    }

    public function rejectAndSendEmail(Request $request)
    {
        $id = $request->notice_id;

        $reasonOne = $request->reasonOne;
        $reasonTwo = $request->reasonTwo;
        $reasonThree = $request->reasonThree;
        $reasonFour = $request->reasonFour;
        $reasons = [];
        array_push($reasons, $reasonOne);
        array_push($reasons, $reasonTwo);
        array_push($reasons, $reasonThree);
        array_push($reasons, $reasonFour);

        $notification = \App\Notification::where('uid', $id)->get();
        $order_id = json_decode($notification[0]->data)->order_id;
        $houseOrder = null;
        try {
            $houseOrder = Order::findOrFail($order_id);
        } catch (\Exception $exception) {
            Toastr::warning('this house has been canceled for rent!');
        }
        if ($houseOrder) {
            $houseOrder->status = StatusInterface::READY;
            $houseOrder->save();
            $sender = 'tg.bluesky66@gmail.com';
            $receive = json_decode($notification[0]->data)->sender;
            Mail::to($receive)
                ->send(new Reject_rent_house_by_the_host($sender, $reasons));
            Toastr::warning('Feedback decline to rent successfully');
            $houseOrder->delete();
        }
        $notification[0]->delete();
        return back();
    }

    public function rejectBooking(Request $request)
    {
        $id = $request->houseIdBooking;
        $reasonOne = $request->reasonOne;
        $reasonTwo = $request->reasonTwo;
        $reasonThree = $request->reasonThree;
        $reasonFour = $request->reasonFour;
        $reasons = [];
        array_push($reasons, $reasonOne);
        array_push($reasons, $reasonTwo);
        array_push($reasons, $reasonThree);
        array_push($reasons, $reasonFour);

        $order = Order::findOrFail($id);
        $email_host = User::findOrFail($order->user_id)->email;
        $nowTimestamp = Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
        $checkInTimestamp = Carbon::parse($order->checkin)->timestamp;
        $sender = 'tg.bluesky66@gmail.com';

        if ($checkInTimestamp - $nowTimestamp >= 86400) {
            $order->delete();
            Mail::to($email_host)
                ->send(new RejectRequestRentHouse($sender, $reasons));
            Toastr::success('reject booking successfully');
        } else {
            Toastr::warning('You cannot cancel your reservation one day in advance');
        }
        return redirect()->route('home');
    }
}
