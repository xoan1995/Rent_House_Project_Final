<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\House;
use App\Http\Requests\HouseRequestValidate;
use App\Http\services\HomeServiceInterface;
use App\Http\services\HouseServiceInterface;
use App\Image;
use App\Rating;
use App\StatusInterface;
use App\User;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TJGazel\Toastr\Facades\Toastr;


class HouseController extends Controller
{
    protected $house;
    protected $user;
    protected $image;
    protected $city;
    protected $district;
    protected $houseService;
    protected $homeService;


    public function __construct(House $house,
                                User $user,
                                Image $image,
                                City $city,
                                District $district,
                                HouseServiceInterface $houseService, HomeServiceInterface $homeService)
    {
        $this->houseService = $houseService;
        $this->house = $house;
        $this->user = $user;
        $this->image = $image;
        $this->district = $district;
        $this->city = $city;
        $this->homeService = $homeService;
    }

    public function create()
    {
        return view('house.create');
    }


    public function store(HouseRequestValidate $request)
    {
        $this->houseService->createHouse($request);
        Toastr::success('upload house success!');
        return redirect('/');
    }

    public function totalHouse($id)
    {
        $ratings = $this->homeService->getAllRating();
        $house = $this->houseService->findHouseById($id);
        return view('totalHouse', compact('house', 'ratings'));
    }

    public function rating(Request $request, $id)
    {
        $house = $this->houseService->findHouseById($id);
        $user = Auth::user();
        $rating = new Rating();
        $rating->user_id = $user->id;
        $rating->house_id = $house->id;
        $rating->star = $request->star;
        $rating->comment = $request->comment;
        $rating->save();
        return redirect()->route('home');
    }

    public function selectCityandDistrict(Request $request)
    {
        $districts = $this->houseService->searchDistrictByCity_id("districts", 'city_id', $request->districtID);

        return response()->json($districts);
    }
}
