<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\City\City;
use App\Models\Country\Country;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use File;


class AdminsController extends Controller
{
    public function viewLogin()
    {

        return view('admins.login');

    }

    public function checkLogin(Request $request)
    {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admin.index');
        }
        return redirect()->back()->with(['error' => 'error logging in']);

    }

    public function index()
    {

        $countries = Country::select()->count();

        $cities = City::select()->count();

        $admins = Admin::select()->count();

        return view('admins.index', compact('countries', 'cities', 'admins'));

    }

    public function allAdmins()
    {

        $admins = Admin::all();

        return view('admins.allAdmins', compact('admins'));

    }

    public function registerAdmin()
    {

        return view('admins.registerAdmin');

    }

    public function storeAdmin(Request $request)
    {

        $validationInput = Request()->validate([
            'name' => 'required|max:200|unique:admins,name',
            'email' => 'required|max:200|unique:admins,email',
            'password' => 'required|min:8'
        ]);


        if ($validationInput) {

            $storeAdmin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->name),
            ]);

            if ($storeAdmin) {

                return redirect()->route('admin.all.admins')->with(['success' => 'New admin added successfully!']);

            }
        }


        return redirect()->route('admin.all.admins')->with(['error' => 'Error: creation new admin failed. Try again...']);

    }

    public function adminLogout()
    {

        if (Auth::guard('admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.viewLogin');
        }

        return redirect()->route('admin.index');

    }

    public function allCountries()
    {

        $countries = Country::all();

        return view('admins.showCountry', compact('countries'));

    }

    public function createCountry()
    {

        return view('admins.createCountry');

    }

    public function storeCountry(Request $request)
    {

        $validationInput = Request()->validate([
            'name' => 'required|max:30',
            'image' => 'required|mimes:jpg,jpeg,png',
            'continent' => 'required|max:30',
            'population' => 'required|max:30',
            'territory' => 'required|max:30',
            'avg_price' => 'required',
            'description' => 'required|max:255'
        ]);


        if ($validationInput) {

            //check if passed image
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                //get name image
                $filename = $file->getClientOriginalName();

                //store image in folder /public/images
                $request->image->move(public_path('/assets/images'), $filename);
            }

            $storeCountry = Country::create([
                'name' => $request->name,
                'image' => $filename,
                'continent' => $request->continent,
                'population' => $request->population,
                'territory' => $request->territory,
                'avg_price' => $request->avg_price,
                'description' => $request->description

            ]);

            if ($storeCountry) {

                return redirect()->route('admin.all.countries')->with(['success' => 'New country added successfully!']);

            }
        }


        return redirect()->route('admin.all.countries')->with(['error' => 'Error: creation new country failed. Try again...']);

    }

    public function deleteCountry($id)
    {

        //find the country record
        $countryToDelete = Country::findOrFail($id);

        //check if saved in public path an image related to the record
        if (File::exists(public_path('assets/images/' . $countryToDelete->image))) {
            File::delete(public_path('assets/images/' . $countryToDelete->image));
        } else {
            dd('File does not exists.');
        }

        //delete record from database
        $countryToDelete->delete();

        return redirect()->route('admin.all.countries')->with(['success' => 'Country selected deleted successfully!']);

    }



    public function allCities()
    {

        $cities = City::all();

        return view('admins.showCities', compact('cities'));

    }

    public function createCity()
    {

        $countries = Country::all();

        return view('admins.createCity', compact('countries'));

    }

    public function storeCity(Request $request)
    {

        $validationInput = Request()->validate([
            'name' => 'required|max:30',
            'image' => 'required|mimes:jpg,jpeg,png',
            'num_days' => 'required|max:30',
            'price' => 'required|max:30',
            'country_id' => 'required',
        ]);


        if ($validationInput) {

            //check if passed image
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                //get name image
                $filename = $file->getClientOriginalName();

                //store image in folder /public/images
                $request->image->move(public_path('/assets/images'), $filename);
            }

            $storeCity = City::create([
                'name' => $request->name,
                'image' => $filename,
                'num_days' => $request->num_days,
                'price' => $request->price,
                'country_id' => $request->country_id,

            ]);

            if ($storeCity) {

                return redirect()->route('admin.all.cities')->with(['success' => 'New city added successfully!']);

            }
        }


        return redirect()->route('admin.all.cities')->with(['error' => 'Error: creation new city failed. Try again...']);

    }

    public function deleteCity($id)
    {

        //find the country record
        $cityToDelete = City::findOrFail($id);

        //check if saved in public path an image related to the record
        if (File::exists(public_path('assets/images/' . $cityToDelete->image))) {
            File::delete(public_path('assets/images/' . $cityToDelete->image));
        } else {
            dd('File does not exists.');
        }

        //delete record from database
        $cityToDelete->delete();

        return redirect()->route('admin.all.cities')->with(['success' => 'City selected deleted successfully!']);

    }


    public function allBookings()
    {

        $bookings = Reservation::all();

        return view('admins.allBookings', compact('bookings'));

    }

    public function editBookings($id)
    {

        $booking = Reservation::find($id);

        return view('admins.editBooking', compact('booking'));

    }

    public function updateBookings(Request $request, $id)
    {

        $booking = Reservation::find($id);

        $booking->update($request->all());

        if ($booking) {

            return redirect()->route('admin.all.bookings')->with(['update' => 'Booking status updated successfully']);
        }
    }

    public function deleteBooking($id)
    {

        //find the country record
        $bookingToDelete = Reservation::findOrFail($id);
        $bookingToDelete->delete();

        return redirect()->route('admin.all.bookings')->with(['success' => 'Booking selected deleted successfully!']);

    }

}
