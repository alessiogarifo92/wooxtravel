<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/traveling/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');

//reservations
Route::get('/traveling/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservation'])->name('traveling.reservation');
Route::post('/traveling/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'storeReservation'])->name('traveling.reservation.store');

//paypal payment with middleware validation
Route::get('/traveling/pay', [App\Http\Controllers\Traveling\TravelingController::class, 'payWithPaypal'])->name('traveling.pay')->middleware('check.for.price');
Route::get('/traveling/pay/success', [App\Http\Controllers\Traveling\TravelingController::class, 'paySuccess'])->name('traveling.pay.success')->middleware('check.for.price');


//deals
Route::get('/traveling/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'deals'])->name('traveling.deals');
Route::any('/traveling/search/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'searchDeals'])->name('traveling.deals.search');
