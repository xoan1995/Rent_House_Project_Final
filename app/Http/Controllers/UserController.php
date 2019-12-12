<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        Toastr::success('update thanh cong');
        return redirect()->route('home');
    }

    public function createHouse()
    {
        return view('house.create');
    }
}
