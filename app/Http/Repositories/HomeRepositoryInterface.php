<?php


namespace App\Http\Repositories;


interface HomeRepositoryInterface extends BaseRepositoryInterface
{
    public function getDistrictByCity_id($district_id);

    public function searchByOneCondition($obj, $fields, $condition);

}
