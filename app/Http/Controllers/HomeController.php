<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use TJGazel\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $house;
    protected $city;

    public function __construct(House $house,
                                City $city)
    {
        $this->house = $house;
        $this->city = $city;
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = $this->city->all();
        $houses = $this->house->all();
//        Toastr::info('Welcome '.Auth::user()->name.'!',"",["positionClass" => "toast-top-left"]);
//        dd($houses[5]->images[0]->path);
        return view('home', compact('houses','cities'));
    }
}
