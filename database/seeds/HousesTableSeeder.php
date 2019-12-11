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
        $house->image_1 = 'rooms/72.jpg';
        $house->image_2 = 'rooms/FLC.jpg';
        $house->image_3 = 'rooms/lotte.jpg';
        $house->image_4 = 'rooms/vietcombank.jpg';
        $house->kindHouse = 'Home Stay';
        $house->kindRoom = 'Phòng đôi';
        $house->address = 'Hà Nội';
        $house->numBedroom = '2';
        $house->numBathroom = '2';
        $house->description = 'Tọa lạc tại ngay mặt đường Pham Hùng, cửa ngõ phía Tây Hà Nội. Keangnam có tổng mức đầu tư cho toàn bộ công trình là 1,05 tỷ USD, bao gồm 2 tòa chung cư cao cấp 48 tầng và tòa nhà tổ hợp văn phòng, khách sạn, trung tâm giải trí 72 tầng.';
        $house->price = 230000;
        $house->city_id = 2;
        $house->save();

        $house = new House();
        $house->title = 'Keangnam Lanmark 72 ';
        $house->image_1 = 'rooms/72.jpg';
        $house->image_2 = 'rooms/FLC.jpg';
        $house->image_3 = 'rooms/lotte.jpg';
        $house->image_4 = 'rooms/vietcombank.jpg';
        $house->kindHouse = 'Home Stay';
        $house->kindRoom = 'Phòng đôi';
        $house->address = 'Hà Nội';
        $house->numBedroom = '2';
        $house->numBathroom = '2';
        $house->description = 'Tọa lạc tại ngay mặt đường Pham Hùng, cửa ngõ phía Tây Hà Nội. Keangnam có tổng mức đầu tư cho toàn bộ công trình là 1,05 tỷ USD, bao gồm 2 tòa chung cư cao cấp 48 tầng và tòa nhà tổ hợp văn phòng, khách sạn, trung tâm giải trí 72 tầng.';
        $house->price = 230000;
        $house->city_id = 2;
        $house->save();

        $house = new House();
        $house->title = 'Keangnam Lanmark 72 ';
        $house->image_1 = 'rooms/72.jpg';
        $house->image_2 = 'rooms/FLC.jpg';
        $house->image_3 = 'rooms/lotte.jpg';
        $house->image_4 = 'rooms/vietcombank.jpg';
        $house->kindHouse = 'Home Stay';
        $house->kindRoom = 'Phòng đôi';
        $house->address = 'Hà Nội';
        $house->numBedroom = '2';
        $house->numBathroom = '2';
        $house->description = 'Tọa lạc tại ngay mặt đường Pham Hùng, cửa ngõ phía Tây Hà Nội. Keangnam có tổng mức đầu tư cho toàn bộ công trình là 1,05 tỷ USD, bao gồm 2 tòa chung cư cao cấp 48 tầng và tòa nhà tổ hợp văn phòng, khách sạn, trung tâm giải trí 72 tầng.';
        $house->price = 230000;
        $house->city_id = 2;
        $house->save();

    }
}
