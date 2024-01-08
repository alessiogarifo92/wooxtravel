<?php

namespace Database\Seeders;

use DB;
use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                "name" => 'Cairo',
                "image" => 'cities-01.jpg',
                "price" => '400',
                "num_days" => '5',
                "country_id" => DB::table('countries')->where('name', '=', 'Egypt')->value('id'),
            ],
            [
                "name" => 'Phuket',
                "image" => 'cities-02.jpg',
                "price" => '850',
                "num_days" => '7',
                "country_id" => DB::table('countries')->where('name', '=', 'Thailand')->value('id'),
            ],
            [
                "name" => 'Zurich',
                "image" => 'cities-03.jpg',
                "price" => '1050',
                "num_days" => '5',
                "country_id" => DB::table('countries')->where('name', '=', 'Switzerland')->value('id'),
            ],
       
         
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($cities as $city){
            City::create($city);
        }
    }
}
