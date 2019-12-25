<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    protected $rating;

    public function __construct(House $house,
                                City $city,
                                Rating $rating)
    {
        $this->house = $house;
        $this->city = $city;
        $this->rating = $rating;
    }

    public function index()
    {
        $cities = $this->city->all();
        $houses = $this->house->all();
        $ratings = $this->rating->all();
        return view('home', compact('houses', 'cities', 'ratings'));
    }

    public function showHouseForCity($id)
    {
        $city = $this->city->findOrFail($id);
        $houses = $city->houses->all();
        return view('house.listHouseForCity', compact('houses', 'city'));
    }

    public function search(Request $request)
    {
        $search = $this->house;
        if (!empty($request->get('city'))) {
            $search = $search->where('city_id', $request->get('city'));
        }
        if (!empty($request->get('numBedroom'))) {
            $search = $search->where('numBedroom', $request->get('numBedroom'));
        }
        if (!empty($request->get('numBathroom'))) {
            $search = $search->where('numBathroom', $request->get('numBathroom'));
        }
        if (!empty($request->get('price'))) {
            $search = $search->where('price', $request->get('price'));
        }

        $cities = City::all();
        $houses = $search->get();
        return view('house.list', compact('houses', 'cities'));
    }

    public function getDistrictList(Request $request)
    {
        $cities = DB::table("districts")
            ->where('city_id', 'LIKE', $request->districtID)->get();
        return response()->json($cities);
    }
}
