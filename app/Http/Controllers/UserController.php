<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editUser()
    {
        return view('user.editUser');
    }

    public function createHouse()
    {
        return view('house.create');
    }
}
