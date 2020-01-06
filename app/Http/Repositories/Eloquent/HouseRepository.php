<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\HouseRepositoryInterface;
use Illuminate\Support\Facades\DB;

class HouseRepository extends BaseRepository implements HouseRepositoryInterface
{

    public function findMaxId($table, $fields)
    {
        return DB::table($table)->max($fields);
    }

    public function searchDistrictByCity_id($table, $fields, $condition)
    {
        return DB::table($table)
            ->where($fields, 'LIKE', $condition)->get();
    }
}
