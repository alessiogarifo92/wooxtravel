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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('traveling')->group(function () {
Route::get('/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');

//reservations
Route::get('/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservation'])->name('traveling.reservation');
Route::post('/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'storeReservation'])->name('traveling.reservation.store');

//paypal payment with middleware validation
Route::get('/pay', [App\Http\Controllers\Traveling\TravelingController::class, 'payWithPaypal'])->name('traveling.pay')->middleware('check.for.price');
Route::get('/pay/success', [App\Http\Controllers\Traveling\TravelingController::class, 'paySuccess'])->name('traveling.pay.success')->middleware('check.for.price');


//deals
Route::get('/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'deals'])->name('traveling.deals');
Route::any('/search/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'searchDeals'])->name('traveling.deals.search');

//my bookings
});

Route::get('/user/myBookings', [App\Http\Controllers\Users\UsersController::class, 'myBookings'])->name('traveling.myBookings');


//Admins
Route::get('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('admin.viewLogin')->middleware('check.for.auth');
Route::post('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('admin.checkLogin');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/logout', [App\Http\Controllers\Admins\AdminsController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admin.index');
   
    //all admins section
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admin.all.admins');
    Route::get('/all-admins/register', [App\Http\Controllers\Admins\AdminsController::class, 'registerAdmin'])->name('admin.register.admin');
    Route::post('/all-admins/register', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmin'])->name('admin.store.admin');
});