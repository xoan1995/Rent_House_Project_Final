<?php

use App\House;
use Illuminate\Database\Seeder;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $house = new House();
        $house->title = 'Keangnam Lanmark 72 ';
        $house->kindHouse = 'Home Stay';
        $house->kindRoom = 'Phòng đôi';
        $house->address = 'Hà Nội';
        $house->numBedroom = '2';
        $house->numBathroom = '2';
        $house->description = 'Tọa lạc tại ngay mặt đường Pham Hùng, cửa ngõ phía Tây Hà Nội. Keangnam có tổng mức đầu tư cho toàn bộ công trình là 1,05 tỷ USD, bao gồm 2 tòa chung cư cao cấp 48 tầng và tòa nhà tổ hợp văn phòng, khách sạn, trung tâm giải trí 72 tầng.';
        $house->price = 67;
        $house->district_id = 1;
        $house->status = \App\StatusInterface::READY;
        $house->city_id = 1;
        $house->user_id = 1;
        $house->save();

        $house = new House();
        $house->title = 'Biệt thự bên dòng sông';
        $house->kindHouse = 'Home Stay';
        $house->kindRoom = 'Phòng đôi';
        $house->address = 'Băc Ninh';
        $house->numBedroom = '2';
        $house->numBathroom = '2';
        $house->description = 'Tọa lạc tại ngay mặt đường Pham Hùng, cửa ngõ phía Tây Hà Nội. Keangnam có tổng mức đầu tư cho toàn bộ công trình là 1,05 tỷ USD, bao gồm 2 tòa chung cư cao cấp 48 tầng và tòa nhà tổ hợp văn phòng, khách sạn, trung tâm giải trí 72 tầng.';
        $house->price = 24;
        $house->status = \App\StatusInterface::READY;
        $house->district_id = 7;
        $house->city_id = 2;
        $house->user_id = 1;
        $house->save();

        $house = new House();
        $house->title = 'nhà trọ trên đỉnh everets';
        $house->kindHouse = 'Home Stay';
        $house->kindRoom = 'Phòng đôi';
        $house->address = 'Hòa Bình';
        $house->numBedroom = '2';
        $house->numBathroom = '2';
        $house->description = 'Tọa lạc tại ngay mặt đường Pham Hùng, cửa ngõ phía Tây Hà Nội. Keangnam có tổng mức đầu tư cho toàn bộ công trình là 1,05 tỷ USD, bao gồm 2 tòa chung cư cao cấp 48 tầng và tòa nhà tổ hợp văn phòng, khách sạn, trung tâm giải trí 72 tầng.';
        $house->price = 41;
        $house->status = \App\StatusInterface::READY;
        $house->district_id = 16;
        $house->city_id = 3;
        $house->user_id = 1;
        $house->save();

        $house = new House();
        $house->title = 'Nhà của dương';
        $house->kindHouse = 'Home Stay';
        $house->kindRoom = 'Phòng đôi';
        $house->address = 'Tuyên Quang';
        $house->numBedroom = '3';
        $house->numBathroom = '4';
        $house->description = 'Tọa lạc tại ngay mặt đường Pham Hùng, cửa ngõ phía Tây Hà Nội. Keangnam có tổng mức đầu tư cho toàn bộ công trình là 1,05 tỷ USD, bao gồm 2 tòa chung cư cao cấp 48 tầng và tòa nhà tổ hợp văn phòng, khách sạn, trung tâm giải trí 72 tầng.';
        $house->price = 15;
        $house->city_id = 4;
        $house->status = \App\StatusInterface::READY;
        $house->district_id = 24;
        $house->user_id = 1;
        $house->save();

    }
}
