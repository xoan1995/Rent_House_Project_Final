<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\HomeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class HomeRepository extends BaseRepository implements HomeRepositoryInterface
{
    public function getDistrictByCity_id($district_id)
    {
        return DB::table("districts")
            ->where('city_id', 'LIKE', $district_id)->get();
    }

    public function searchByOneCondition($obj, $fields, $condition)
    {
        return $obj->where($fields, $condition);
    }
}
