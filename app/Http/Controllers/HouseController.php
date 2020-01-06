<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\House;
use App\Http\Requests\HouseRequestValidate;
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

    public function __construct(House $house,
                                User $user,
                                Image $image,
                                City $city,
                                District $district)
    {
        $this->house = $house;
        $this->user = $user;
        $this->image = $image;
        $this->district = $district;
        $this->city = $city;
    }

    public function create()
    {
        return view('house.create');
    }


    public function store(HouseRequestValidate $request)
    {
        $house = new House();
        $house->title = $request->title;
        $house->kindHouse = $request->kindHouse;
        $house->kindRoom = $request->kindRoom;
        $house->address = $request->address;
        $house->numBedroom = $request->numBedroom;
        $house->numBathroom = $request->numBathroom;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->city_id = $request->city_id;
        $house->user_id = auth()->user()->id;
        $house->status = StatusInterface::READY;
        $house->district_id = $request->district_id;
        $house->save();

        if ($request->images) {
            $house_id = DB::table('houses')->max('id');
            foreach ($request->images as $image) {

                $path = $image->store('rooms', 'public');

                $imageUpload = new Image();
                $imageUpload->path = $path;
                $imageUpload->house_id = $house_id;
                $imageUpload->save();
            }
        } else {
            return back();
        }
        Toastr::success('upload house success!');
        return redirect('/');
    }

    public function totalHouse($id)
    {
        $ratings = Rating::all();
        $house = $this->house->findOrFail($id);
        $sumStar = 0;
        foreach ($ratings as $rating) {
            $sumStar = $rating->star + $sumStar;
        }
        $sumRating = DB::table('ratings')->max('id');
        $muxStar= 5*$sumRating;
        $with=120;
        $average_user_rating=$sumStar/$muxStar*5;
        return view('totalHouse', compact('house', 'ratings', 'average_user_rating','with'));
    }

    public function rating(Request $request, $id)
    {
        $house = House::findOrFail($id);
        $user = Auth::user();
        $rating = new Rating();
        $rating->user_id = $user->id;
        $rating->house_id = $house->id;
        $rating->star = $request->star;
        $rating->save();
        return redirect()->route('home');
    }

    public function selectCityandDistrict(Request $request)
    {
        $districts = DB::table("districts")
            ->where('city_id', 'LIKE', $request->districtID)->get();

        return response()->json($districts);
    }
}
