<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = new \App\Image();
        $image->path = 'rooms/room-4.jpg';
        $image->house_id = 1;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-1.jpg';
        $image->house_id = 1;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-2.jpg';
        $image->house_id = 1;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-3.jpg';
        $image->house_id = 1;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-4.jpg';
        $image->house_id = 2;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-1.jpg';
        $image->house_id = 2;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-2.jpg';
        $image->house_id = 2;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-3.jpg';
        $image->house_id = 2;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-4.jpg';
        $image->house_id = 3;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-1.jpg';
        $image->house_id = 3;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-2.jpg';
        $image->house_id = 3;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-3.jpg';
        $image->house_id = 3;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-4.jpg';
        $image->house_id = 4;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-1.jpg';
        $image->house_id = 4;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-2.jpg';
        $image->house_id = 4;
        $image->save();

        $image = new \App\Image();
        $image->path = 'rooms/room-3.jpg';
        $image->house_id = 4;
        $image->save();
    }
}
