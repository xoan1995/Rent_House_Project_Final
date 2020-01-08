<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rating = new \App\Rating();
        $rating->star= 2;
        $rating->content='Good!';
        $rating->user_id=1;
        $rating->house_id=2;
        $rating->save();

        $rating = new \App\Rating();
        $rating->star= 2;
        $rating->content='Good!';
        $rating->user_id=1;
        $rating->house_id=1;
        $rating->save();

        $rating = new \App\Rating();
        $rating->star= 2;
        $rating->content='Good!';
        $rating->user_id=1;
        $rating->house_id=2;
        $rating->save();

        $rating = new \App\Rating();
        $rating->star= 2;
        $rating->content='Good!';
        $rating->user_id=1;
        $rating->house_id=1;
        $rating->save();
    }
}
