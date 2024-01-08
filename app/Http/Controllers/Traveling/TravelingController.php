<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Http\Request;

class TravelingController extends Controller
{
    public function about($id){

        $countryInfo = Country::find($id);

        $cities = City::select()->orderBy('id','desc')->take(5)->where('country_id',$id)->get();

        $citiesCount = City::select()->where('country_id',$id)->count();

        return view('traveling.about', compact('countryInfo','cities','citiesCount'));

    }
}
