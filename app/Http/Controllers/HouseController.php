<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\House;
use App\Http\Requests\HouseRequestValidate;
use App\Image;
use App\StatusInterface;
use App\User;
use http\Client\Response;
use Illuminate\Http\Request;
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
        $districts = District::all();
        $cities = City::all();
        return view('house.create', compact('cities', 'districts'));
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

        if ($request->images){
            $house_id = DB::table('houses')->max('id');
            foreach ($request->images as $image) {

                $path = $image->store('rooms', 'public');

                $imageUpload = new Image();
                $imageUpload->path = $path;
                $imageUpload->house_id = $house_id;
                $imageUpload->save();
            }
        }else {
            return back();
        }
        Toastr::success('upload house success!');
        return redirect('/');
    }

    public function totalHouse($id)
    {
        $house = $this->house->findOrFail($id);
        return view('totalHouse', compact('house'));
    }

}
