<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Http\services\Implement\HomeService;
use App\Rating;
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

    protected $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index()
    {
        $cities = $this->homeService->getAllCities();
        $houses = $this->homeService->getAllHouses();
        $ratings = $this->homeService->getAllRating();
        return view('home', compact('houses', 'cities', 'ratings'));
    }

    public function showHouseForCity($id)
    {
        $city = $this->homeService->findCityById($id);
        $houses = $this->homeService->getAllHouses();
        return view('house.listHouseForCity', compact('houses', 'city'));
    }

    public function search(Request $request)
    {
        $cities = $this->homeService->getAllCities();

        $houses = $this->homeService->search($request);

        return view('house.list', compact('houses', 'cities'));
    }

    public function getDistrictList(Request $request)
    {
        $cities = $this->homeService->getDistrictByCity_id($request);
        return response()->json($cities);
    }
}
