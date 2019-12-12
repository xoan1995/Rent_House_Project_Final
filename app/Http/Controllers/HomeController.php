<?php

namespace App\Http\Controllers;

use App\House;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $house;

    public function __construct(House $house)
    {
        $this->house = $house;
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $houses = $this->house->all();
//        dd($houses[5]->images[0]->path);
        return view('home', compact('houses'));
    }
}
