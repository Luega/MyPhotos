<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotosTableSeeder extends Seeder
{

    public function run()
    {
            for($i = 1; $i <= 27; $i++) {
            $photo = new Photo();
            $photo->title = 'Photo : ' . $i;
            $photo->url = '/img/' . $i . '.png';

            $photo->save();
        }
    }
}
