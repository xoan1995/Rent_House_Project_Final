<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\EditUserRequest;
use App\Mail\OrderShipped;
use App\Notifications\RepliedRequestRentHouse;
use App\User;
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
        $user_id = \auth()->id();
        $houses_posted = House::where('user_id', 'LIKE', $user_id)->get();
        $notifications_booking = \App\Notification::where('notifiable_id', 'LIKE', $user_id)->get();
        $houses_booking = [];
        foreach ($notifications_booking as $value) {
            $house_id = json_decode($value->data)->house_id;
            $house = House::findOrFail($house_id);
            array_push($houses_booking, $house);
        }

        return view('user.house_posted', compact('houses_posted','houses_booking'));
    }

    public function acceptAndSendEmail()
    {
        $sender = 'tg.bluesky66@gmail.com';
        $receive = 'tg.bluesky65@gmail.com';
        Mail::to($receive)
            ->send(new \App\Mail\RepliedRequestRentHouse($sender));
        Toastr::success('this rental is complete!');
        return back();
    }

    public function rejectAndSendEmail()
    {

    }

}
