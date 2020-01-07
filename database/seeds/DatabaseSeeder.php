<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(HousesTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);

    }
}
