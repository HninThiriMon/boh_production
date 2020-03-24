<?php

use Illuminate\Database\Seeder;
use App\HomeCover;

class CreateHomeCoversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cover = [
            [
               'home_cover'=>'default_home_cover.jpg',
            ],

        ];
  
        foreach ($cover as $key => $value) {
            HomeCover::create($value);
        }
        


    }
}
