<?php

namespace App\Http\Controllers;

use App\Charts\RevenueStatisticsByMonth;
use App\House;
use App\Http\Requests\EditUserRequest;
use App\Http\services\UserServiceInterface;
use App\Mail\Reject_rent_house_by_the_host;
use App\Mail\RejectRequestRentHouse;
use App\Order;
use App\StatusInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use TJGazel\Toastr\Facades\Toastr;

class UserController extends Controller
{
    protected $user;
    protected $userService;

    public function __construct(User $user, UserServiceInterface $userService)
    {
        $this->user = $user;
        $this->userService = $userService;
        $this->middleware('auth');
    }

    public function editUser()
    {
        $user = $this->userService->getUserCurrentlyLoggedIn();
        return view('user.editUser', compact('user'));
    }

    public function update(EditUserRequest $request)
    {
        $this->userService->update($request);
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
                    $this->userService->changePassword($request_data);
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
        $user = $this->userService->getUserCurrentlyLoggedIn();
        $totalPrice = $user->orders;
        $totalPriceForMonth = 0;
        for ($i = 0; $i < count($totalPrice); $i++) {
            $totalPriceForMonth += +($totalPrice[$i]->totalPrice);
        }

        $user_id = $this->userService->getUserCurrentlyLoggedIn()->id;

        $houses_posted = $this->userService->findHousePosted($user_id, 'user_id');

        $houses_booking = $this->userService->findHouseBooking($user_id, 'user_id');

        return view('user.house_posted', compact('houses_posted', 'houses_booking'));
    }

    public function acceptAndSendEmail($id)
    {
        $notification = $this->userService->findNotificationByUid($id, 'uid');
        $order_id = json_decode($notification[0]->data)->order_id;
        $house_id = json_decode($notification[0]->data)->house_id;
        $house = House::find($house_id);
        $house->status = StatusInterface::UNREADY;
        $house->save();
        $this->userService->acceptRent($notification, $order_id);
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

        $notification = $this->userService->findNotificationByUid($id, 'uid');
        $order_id = json_decode($notification[0]->data)->order_id;
        $this->userService->rejectRent($reasons, $notification, $order_id);
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

        $order = $this->userService->findOrderById($id);
        $email_host = $this->userService->findUserById($order->user_id)->email;
        $this->userService->rejectBooking($order, $email_host, $reasons);
        return back();
    }

    public function revenueStatisticsByMonth(Request $request)
    {
        if ($request->year) {
            $nowYear = $request->year;
        } else {
            $nowYear = Carbon::parse(Carbon::now())->format('y');
        }
        $userId = Auth::user()->id;

        $houseOrders = Order::all();

        $ord = [];
        for ($i = 0; $i < 12; $i++) {
            array_push($ord, []);
        }
        foreach ($houseOrders as $key1 => $order) {
            foreach ($ord as $key2 => $abc) {
                if ($order->user_id == $userId) {
                    if (+Carbon::parse($order->checkin)->format('y') == +$nowYear) {
                        if (+Carbon::parse($order->checkin)->format('m') == ($key2 + 1)) {
                            array_push($ord[$key2], $order);
                        }
                    }
                }
            }
        }
        $incomeOnMonth = [];
        for ($i = 0; $i < 12; $i++) {
            array_push($incomeOnMonth, []);
        }
        foreach ($ord as $key1 => $value) {
            foreach ($value as $key2 => $item) {
                foreach ($incomeOnMonth as $key3 => $value) {
                    if (+Carbon::parse($item->checkin)->format('m') == ($key3 + 1)) {
                        array_push($incomeOnMonth[$key3], $item->totalPrice);
                    }
                }
            }
        }
        $moneyOnMonth = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($incomeOnMonth as $key => $item) {
            foreach ($item as $value) {
                $moneyOnMonth[$key] = $moneyOnMonth[$key] + $value;
            }
        }
        $chart = new RevenueStatisticsByMonth();
        $chart->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
        $chart->dataset("My Revenue Statistics in 20{$nowYear}", 'line', [
            $moneyOnMonth[0],
            $moneyOnMonth[1],
            $moneyOnMonth[2],
            $moneyOnMonth[3],
            $moneyOnMonth[4],
            $moneyOnMonth[5],
            $moneyOnMonth[6],
            $moneyOnMonth[7],
            $moneyOnMonth[8],
            $moneyOnMonth[9],
            $moneyOnMonth[10],
            $moneyOnMonth[11],
        ]);
        return view('house.statisticsByMonth', compact('chart'));
    }
}
