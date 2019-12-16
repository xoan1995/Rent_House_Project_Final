<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
use App\Http\Requests\HouseRequestValidate;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    protected $house;
    protected $user;
    protected $image;

    public function __construct(House $house,
                                User $user,
                                Image $image)
    {
        $this->house = $house;
        $this->user = $user;
        $this->image = $image;
        $this->middleware('auth');
    }

    public function create()
    {
        $cities = City::all();
        return view('house.create', compact('cities'));
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
        $house->save();
        return view('house.images.create');
    }

    public function createImage()
    {
        return view('house.images.create');
    }

    public function storeImage(Request $request)
    {
        $house_id = DB::table('houses')->max('id');
        $image = $request->file('file');
        $path = $image->store('rooms', 'public');

        $imageUpload = new Image();
        $imageUpload->path = $path;
        $imageUpload->house_id = $house_id;
        $imageUpload->save();
//        return response()->json(['success' => $path]);
        return redirect()->route('home');
    }

    public function totalHouse($id)
    {
        $house = $this->house->findOrFail($id);
        return view('totalHouse',compact('house'));
    }
}
