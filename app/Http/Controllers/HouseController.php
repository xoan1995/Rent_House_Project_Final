<?php

namespace App\Http\Controllers;

use App\House;
use App\User;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    protected $house;
    protected $user;

    public function __construct(House $house,
                                User $user)
    {
        $this->house = $house;
        $this->user = $user;
    }

    public function getAllHouse()
    {
        $houses = $this->house->all();
        return view('house.list',compact('houses'));
    }
}
