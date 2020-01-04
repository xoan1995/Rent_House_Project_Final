<?php


namespace App\Http\Repositories;


interface HouseRepositoryInterface extends BaseRepositoryInterface
{
    public function findMaxId($table, $fields);

    public function searchDistrictByCity_id($table, $fields, $condition);
}
