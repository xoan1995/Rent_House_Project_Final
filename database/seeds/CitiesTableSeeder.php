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
        $city= new City();
        $city->name='Hà Nội';
        $city->save();

        $city= new City();
        $city->name='Bắc Ninh';
        $city->save();

        $city= new City();
        $city->name='Tuyên Quang';
        $city->save();

        $city= new City();
        $city->name='Thái Nguyên';
        $city->save();

        $city= new City();
        $city->name='Lào Cai';
        $city->save();

        $city= new City();
        $city->name='Yên Bái';
        $city->save();

        $city= new City();
        $city->name='Quảng Ninh';
        $city->save();

        $city= new City();
        $city->name='Hải Dương';
        $city->save();

        $city= new City();
        $city->name='Hòa Bình';
        $city->save();

        $city= new City();
        $city->name='Hà Nam';
        $city->save();

        $city= new City();
        $city->name='Ninh Bình';
        $city->save();

        $city= new City();
        $city->name='Đà lạt';
        $city->save();

        $city= new City();
        $city->name='Đà Nẵng';
        $city->save();

        $city= new City();
        $city->name='Huế';
        $city->save();

        $city= new City();
        $city->name='Nghệ An';
        $city->save();


    }
}
