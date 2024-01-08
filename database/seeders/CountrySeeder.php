<?php

namespace Database\Seeders;

use App\Models\Country\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               // Create Sample Dummy Users Array
               $countries = [
                [
                    "name" => "Egypt",
                    "population"=> "100.41",
                    "territory"=> "275.400",
                    "avg_price"=> "165.450",
                    "description"=> "Lorem ipsum dolor sit amet consectetur adipiscing elit litora vel, mauris primis felis sociis duis quis suscipit urna sapien penatibus, curae donec cursus mi consequat tincidunt potenti himenaeos. Magnis nibh convallis nullam pretium in interdum per, nisi semper lectus proin senectus varius rhoncus sollicitudin, pellentesque lacus vehicula metus hac praesent.",
                    "image"=> "country-01.jpg",
                    "continent"=> "Africa"
                ],
                [
                    "name" => "Thailand",
                    "population"=> "33.8",
                    "territory"=> "300.100",
                    "avg_price"=> "115.300",
                    "description"=> "Lorem ipsum dolor sit amet consectetur adipiscing elit litora vel, mauris primis felis sociis duis quis suscipit urna sapien penatibus, curae donec cursus mi consequat tincidunt potenti himenaeos. Magnis nibh convallis nullam pretium in interdum per, nisi semper lectus proin senectus varius rhoncus sollicitudin, pellentesque lacus vehicula metus hac praesent.",
                    "image"=> "country-02.jpg",
                    "continent"=> "Asia"
                ],
                [
                    "name" => "Switzerland",
                    "population"=> "20.1",
                    "territory"=> "41.100",
                    "avg_price"=> "425.300",
                    "description"=> "Lorem ipsum dolor sit amet consectetur adipiscing elit litora vel, mauris primis felis sociis duis quis suscipit urna sapien penatibus, curae donec cursus mi consequat tincidunt potenti himenaeos. Magnis nibh convallis nullam pretium in interdum per, nisi semper lectus proin senectus varius rhoncus sollicitudin, pellentesque lacus vehicula metus hac praesent.",
                    "image"=> "country-03.jpg",
                    "continent"=> "Europe"
                ]
             
            ];
    
            // Looping and Inserting Array's Users into User Table
            foreach($countries as $country){
                Country::create($country);
            }
    }
}
