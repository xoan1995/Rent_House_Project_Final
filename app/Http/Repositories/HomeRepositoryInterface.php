<?php


namespace App\Http\Repositories;


interface HomeRepositoryInterface
{
    public function getAll($obj);

    public function findById($obj, $id);

    public function getDistrictByCity_id($district_id);

    public function searchByOneCondition($obj, $fields, $condition);

    public function get($obj);
}
