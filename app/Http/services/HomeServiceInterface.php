<?php


namespace App\Http\services;


interface HomeServiceInterface extends BaseServiceInterface
{
    public function getDistrictByCity_id($request);

    public function getConditionSearch($request);

    public function search($request);
}
