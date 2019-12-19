<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->name = 'Hà Nội';
        $city->image = 'cities/hanoi.jpeg';
        $city->save();

        $city = new City();
        $city->name = 'Bắc Ninh';
        $city->image = 'cities/bacninh.jpg';
        $city->save();

        $city = new City();
        $city->name = 'Tuyên Quang';
        $city->image = 'cities/tuyenquang.jpg';
        $city->save();

        $city = new City();
        $city->name = 'Thái Nguyên';
        $city->image = 'cities/thainguyen.jpg';
        $city->save();

        $city = new City();
        $city->name = 'Lào Cai';
        $city->image = 'cities/laocai.jpg';
        $city->save();

        $city = new City();
        $city->name = 'Yên Bái';
        $city->image = 'cities/yenbai.jpg';
        $city->save();

        $city = new City();
        $city->name = 'Quảng Ninh';
        $city->image = 'cities/quangninh.jpg';
        $city->save();

        $city = new City();
        $city->name = 'Hải Dương';
        $city->image = 'cities/haiduong.jpg';
        $city->save();

        $city = new City();
        $city->name = 'Hòa Bình';
        $city->image = 'cities/hoabinh.jpg';
        $city->save();

        $city = new City();
        $city->name = 'Hà Nam';
        $city->image = 'cities/hanam.jpg';
        $city->save();

    }
}
