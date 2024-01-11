<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Http\Request;
use Auth;

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

    public function adminLogout()
    {

        if (Auth::guard('admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.viewLogin');
        }

        return redirect()->route('admin.index');

    }
}
