<?php


namespace App\Http\services\Implement;


use App\City;
use App\House;
use App\Image;
use App\Http\Repositories\HouseRepositoryInterface;
use App\Http\services\BaseService;
use App\Http\services\HouseServiceInterface;
use App\Rating;
use App\StatusInterface;


class HouseService extends BaseService implements HouseServiceInterface
{
    protected $house;
    protected $user;
    protected $image;
    protected $city;
    protected $district;
    protected $houseRepository;
    protected $rating;

    public function __construct(House $house,
                                City $city,
                                HouseRepositoryInterface $houseRepository,
                                Image $image, Rating $rating)
    {
        $this->rating = $rating;
        $this->image = $image;
        $this->house = $house;
        $this->houseRepository = $houseRepository;
    }

    public function createHouse($request)
    {
        $house = $this->house;
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
        $this->houseRepository->save($house);

        if ($request->images) {
            $house_id = $this->houseRepository->findMaxId('houses', 'id');
            foreach ($request->images as $image) {
                $path = $image->store('rooms', 'public');
                $imageUpload = new Image();
                $imageUpload->path = $path;
                $imageUpload->house_id = $house_id;
                $this->houseRepository->save($imageUpload);
            }
        } else {
            return back();
        }
    }

    public function findHouseById($id)
    {
        return $this->houseRepository->findById($this->house, $id);
    }

    public function searchDistrictByCity_id($table, $fields, $condition)
    {
        return $this->houseRepository->searchDistrictByCity_id($table, $fields, $condition);
    }
}
