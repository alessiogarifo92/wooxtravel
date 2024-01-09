<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Country\Country;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;


class TravelingController extends Controller
{
    public function about($id)
    {

        $countryInfo = Country::find($id);

        $cities = City::select()->orderBy('id', 'desc')->take(5)->where('country_id', $id)->get();

        $citiesCount = City::select()->where('country_id', $id)->count();

        return view('traveling.about', compact('countryInfo', 'cities', 'citiesCount'));

    }

    //reservation methods
    public function makeReservation($id)
    {

        $city = City::find($id);

        return view('traveling.reservation', compact('city'));

    }

    public function storeReservation(Request $request, $id)
    {

        $city = City::find($id);

        //check if date insert is in the future
        if ($request->check_in_date > date("Y-m-d")) {

            $totalPrice = (int) $city->price * (int) $request->num_guests;

            $storeReservation = Reservation::create([
                "name" => $request->name,
                "phone_number" => $request->phone_number,
                "num_guests" => $request->num_guests,
                "check_in_date" => $request->check_in_date,
                "destination" => $request->destination,
                "price" => $totalPrice,
                "user_id" => Auth::user()->id
            ]);

            if ($storeReservation) {

                $price = Session::put('price', $totalPrice);

                $finalPrice = Session::get('$price');

                return redirect()->route('traveling.pay');
            }
        } else {
            return view('traveling.reservation', compact('city'))->with(['date' => 'Date Error: insert a date in the future!']);

        }


        return view('traveling.reservation', compact('city'))->with(['error' => 'Reservation error: try again!']);


    }

    //payment methods
    public function payWithPaypal()
    {


        return view('traveling.pay');

    }

    public function paySuccess()
    {

        //find last id insert in reservation from auth user and change reservation status to "Payed"
        $id = Reservation::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first()->id;
        Reservation::where('id', $id)->update(['status' => 'Payed']);

        //remove price amount from session
        Session::forget('price');

        return view('traveling.paySuccess');

    }


    //deals methods
    public function deals()
    {

        $cities = City::select()->orderBy('id', 'desc')->take(4)->get();

        $countries = Country::all();

        return view('traveling.deals', compact('cities', 'countries'));

    }


    public function searchDeals(Request $request)
    {

        $country_id = $request->get('country_id');
        $price = $request->get('price');

        $searches = City::where('country_id', $country_id)->where('price', '<=', $price)->orderBy('id', 'desc')->take(4)->get();

        $countries = Country::all();


        return view('traveling.searchdeals', compact('searches', 'countries'));

    }
}

