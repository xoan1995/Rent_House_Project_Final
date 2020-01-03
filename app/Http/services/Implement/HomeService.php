<?php


namespace App\Http\services\Implement;

use App\Http\services\BaseService;
use App\Http\services\HomeServiceInterface;
use App\StatusInterface;
use Carbon\Carbon;

class HomeService extends BaseService implements HomeServiceInterface
{
    public function getDistrictByCity_id($request)
    {
        return $this->homeRepository->getDistrictByCity_id($request->districtID);
    }

    public function getConditionSearch($request)
    {
        $search = $this->houses;

        if (!empty($request->city)) {
            $search = $this->homeRepository->searchByOneCondition($search, 'city_id', $request->city);
        }
        if (!empty($request->numBedroom)) {
            $search = $this->homeRepository->searchByOneCondition($search, 'numBedroom', $request->numBedroom);
        }
        if (!empty($request->numBathroom)) {
            $search = $this->homeRepository->searchByOneCondition($search, 'numBathroom', $request->numBathroom);
        }
        if (!empty($request->price)) {
            $search = $this->homeRepository->searchByOneCondition($search, 'price', $request->price);
        }
        $houses_db = $this->homeRepository->get($search);

        $houses = [];
        for ($j = 0; $j < count($houses_db); $j++) {
            array_push($houses, $houses_db[$j]);
        }
        return $houses;
    }


    public function search($request)
    {
        $houses = $this->getConditionSearch($request);

        $housesOrder = $this->getAllOrders();

        for ($i = 0; $i < count($housesOrder); $i++) {
            for ($j = 0; $j < count($houses); $j++) {
                if ($housesOrder[$i]['house_id'] == $houses[$j]['id']
                    && ($housesOrder[$i]["status"] == StatusInterface::PENDING || $housesOrder[$i]["status"] == StatusInterface::UNREADY)
                ) {
                    array_splice($houses, $j, 1);
                }
                if (!empty($request->checkin) && !empty($request->checkout)) {
                    if ((Carbon::parse($request->get('checkin'))->timestamp >= Carbon::parse($housesOrder[$i]->checkin)->timestamp
                            || Carbon::parse($request->get('checkout'))->timestamp >= Carbon::parse($housesOrder[$i]->checkout)->timestamp)
                        && $housesOrder[$i]['house_id'] == $houses[$j]['id']) {
                        array_splice($houses, $j, 1);
                    }
                }
            }
        }

        return $houses;
    }
}
