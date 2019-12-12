<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user->dob = $request->dob;
        $user->idCard = $request->idCard;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('home');
    }

    public function createHouse()
    {
        return view('house.create');
    }
}
