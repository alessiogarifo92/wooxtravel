<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
}
