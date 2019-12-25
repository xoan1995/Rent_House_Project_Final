<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Order;
use App\StatusInterface;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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
        return view('house.listHouseForCity', compact('houses', 'city'));
    }

    public function search(Request $request)
    {
        $search = $this->house;
        $searchOrder = new Order();
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
        if (!empty($request->get('checkin'))) {
            $searchOrder = $searchOrder->where('checkin', $request->get('checkin'));
        }
        if (!empty($request->get('checkout'))) {
            $searchOrder = $searchOrder->where('checkout', $request->get('checkout'));
        }
        $cities = City::all();
        $houses_db = $search->get();
        $houses = [];
        for ($j = 0; $j < count($houses_db); $j++) {
            array_push($houses, $houses_db[$j]);
        }

        $housesOrder = Order::all();
        for ($i = 0; $i < count($housesOrder); $i++) {
            for ($j = 0; $j < count($houses); $j++) {
                if ($housesOrder[$i]['house_id'] == $houses[$j]['id']
                    && ($housesOrder[$i]["status"] == StatusInterface::PENDING || $housesOrder[$i]["status"] == StatusInterface::UNREADY)
                ) {
                    array_splice($houses, $j, 1);
                }
                if (!empty($request->get('checkin')) && !empty($request->get('checkout'))) {
                    if ((Carbon::parse($request->get('checkin'))->timestamp >= Carbon::parse($housesOrder[$i]->checkin)->timestamp
                            || Carbon::parse($request->get('checkout'))->timestamp >= Carbon::parse($housesOrder[$i]->checkout)->timestamp)
                        && $housesOrder[$i]['house_id'] == $houses[$j]['id']) {
                        array_splice($houses, $j, 1);
                    }
                }
            }

        }
        return view('house.list', compact('houses', 'cities'));
    }

    public function getDistrictList(Request $request)
    {
        $cities = DB::table("districts")
            ->where('city_id', 'LIKE', $request->districtID)->get();
        return response()->json($cities);
    }
}
