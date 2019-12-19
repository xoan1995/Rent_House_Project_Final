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

    }

    public function index()
    {
        $cities = $this->city->all();
        $houses = $this->house->all();
        return view('home', compact('houses', 'cities'));
    }

    public function showHouseForCity($id)
    {
        $city = $this->city->findOrFail($id);
        $houses = $city->houses->all();
        return view('house.listHouseForCity', compact('houses','city'));
    }
}
