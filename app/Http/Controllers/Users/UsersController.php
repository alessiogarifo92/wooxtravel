<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function myBookings(){


        $bookings = Reservation::select()->where('user_id', Auth::user()->id)->get();

        return view('users.bookings', compact('bookings'));

    }
}
