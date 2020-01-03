<?php


namespace App\Http\services;


interface BaseServiceInterface
{
    public function getAllCities();

    public function getAllHouses();

    public function getAllRating();

    public function getAllOrders();

    public function findCityById($id);
}
