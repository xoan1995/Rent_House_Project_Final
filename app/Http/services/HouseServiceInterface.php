<?php


namespace App\Http\services;


interface HouseServiceInterface extends BaseServiceInterface
{
    public function createHouse($request);

    public function findHouseById($id);

    public function searchDistrictByCity_id($table, $fields, $condition);

}
