<?php


namespace App\Http\services\Implement;

use App\Charts\RevenueStatisticsByMonth;
use App\House;
use App\Http\Repositories\UserRepositoryInterface;
use App\Http\services\BaseService;
use App\Http\services\UserServiceInterface;
use App\Mail\Reject_rent_house_by_the_host;
use App\Mail\RejectRequestRentHouse;
use App\Notification;
use App\Order;
use App\StatusInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use TJGazel\Toastr\Facades\Toastr;

class UserService extends BaseService implements UserServiceInterface
{
    protected $user;
    protected $userRepository;
    protected $house;
    protected $orders;
    protected $notification;

    public function __construct(UserRepositoryInterface $userRepository,
                                User $user,
                                House $house,
                                Order $order, Notification $notification)
    {
        $this->orders = $order;
        $this->user = $user;
        $this->userRepository = $userRepository;
        $this->houses = $house;
        $this->notification = $notification;
    }

    public function getAllUser()
    {
        return $this->userRepository->getAll($this->user);
    }

    public function update($request)
    {
        $user = $this->getUserCurrentlyLoggedIn();

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
        return $this->userRepository->save($user);
    }

    public function getUserCurrentlyLoggedIn()
    {
        return $this->userRepository->getUserCurrentlyLoggedIn();
    }

    public function findOrderById($id)
    {
        return $this->userRepository->findById($this->orders, $id);
    }

    public function findUserById($id)
    {
        return $this->userRepository->findById($this->user, $id);
    }

    public function changePassword($request_data)
    {
        $user_id = $this->getUserCurrentlyLoggedIn()->id;
        $obj_user = $this->findUserById($user_id);
        $obj_user->password = Hash::make($request_data['passwordNew1']);;
        return $this->userRepository->save($obj_user);
    }

    function findHousePosted($condition, $fields)
    {
        $houses = $this->houses->where($fields, 'LIKE', $condition);
        return $this->userRepository->get($houses);
    }

    function findHouseBooking($condition, $fields)
    {
        $houses = $this->orders->where($fields, $condition);
        return $this->userRepository->get($houses);
    }

    function findNotificationByUid($uid, $fields)
    {
        $notification = $this->notification->where($fields, $uid);
        return $this->userRepository->get($notification);
    }

    function acceptRent($notification, $order_id)
    {
        $houseOrder = null;
        try {
            $houseOrder = Order::findOrFail($order_id);
        } catch (\Exception $exception) {
            Toastr::warning('this house has been canceled for rent!');
        }
        if ($houseOrder) {
            $houseOrder->status = StatusInterface::UNREADY;
            $this->userRepository->save($houseOrder);
            $sender = 'tg.bluesky66@gmail.com';
            $receive = json_decode($notification[0]->data)->sender;
            Mail::to($receive)
                ->queue(new \App\Mail\RepliedRequestRentHouse($sender));
            Toastr::success('This rental is complete!');
        }
        return $this->userRepository->delete($notification[0]);
    }

    function rejectRent($reasons, $notification, $order_id)
    {
        $houseOrder = null;
        try {
            $houseOrder = Order::findOrFail($order_id);
        } catch (\Exception $exception) {
            Toastr::warning('this house has been canceled for rent!');
        }
        if ($houseOrder) {
            $houseOrder->status = StatusInterface::READY;
            $this->userRepository->save($houseOrder);
            $sender = 'tg.bluesky66@gmail.com';
            $receive = json_decode($notification[0]->data)->sender;
            Mail::to($receive)
                ->queue(new Reject_rent_house_by_the_host($sender, $reasons));
            Toastr::warning('Feedback decline to rent successfully');
            $this->userRepository->delete($houseOrder);
        }
        return $this->userRepository->delete($notification[0]);
    }

    function rejectBooking($order, $email_host, $reasons)
    {
        {
            $nowTimestamp = Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
            $checkInTimestamp = Carbon::parse($order->checkin)->timestamp;
            $sender = 'tg.bluesky66@gmail.com';

            if ($checkInTimestamp - $nowTimestamp >= 86400) {
                $this->userRepository->delete($order);
                Mail::to($email_host)->queue(new RejectRequestRentHouse($sender, $reasons));
                session()->flash('reject booking successfully');
                return back();
            } else {
                session()->flash('alert', 'You cannot cancel your reservation one day in advance');
            }
        }
    }

    public function getIncomeOfMonth($nowYear)
    {

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
        return $moneyOnMonth;
    }

    public function creatChart($moneyOnMonth, $nowYear)
    {
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
        return $chart;
    }
}
