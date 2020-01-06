<?php


namespace App\Http\services;


use App\City;
use App\House;
use App\Http\Repositories\HomeRepositoryInterface;
use App\Order;
use App\Rating;

class BaseService
{
    protected $homeRepository;
    protected $houses;
    protected $cities;
    protected $rating;
    protected $orders;

    public function __construct(HomeRepositoryInterface $homeRepository,
                                House $house,
                                City $city,
                                Rating $rating,
                                Order $order)
    {
        $this->homeRepository = $homeRepository;
        $this->houses = $house;
        $this->cities = $city;
        $this->rating = $rating;
        $this->orders = $order;
    }

    public function getAllCities()
    {
        return $this->homeRepository->getAll($this->cities);
    }

    public function getAllHouses()
    {
        return $this->homeRepository->getAll($this->houses);
    }

    public function getAllRating()
    {
        return $this->homeRepository->getAll($this->rating);
    }

    public function getAllOrders()
    {
        return $this->homeRepository->getAll($this->orders);
    }

    public function findCityById($id)
    {
        return $this->homeRepository->findById($this->cities, $id);
    }

}
