<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\RegisterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoomFacilityController;
use App\Http\Controllers\Backend\PublicFacilityController;
use App\Http\Controllers\Backend\ReceptionistBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout.main');
// });


// FrontEnd
// Route::get('user/index', function(){
//     return view('user.index');
// });

Route::get('/',[HomeController::class,'index']);
Route::post('/booking',[HomeController::class,'store']);













// BackEnd

Route::get('/admin/dashboard',[DashboardController::class,'indexAdmin'])->middleware('admin');
Route::get('/receptionist/dashboard',[DashboardController::class,'indexReceptionist'])->middleware('receptionist');

Route::get('/login',[LoginController::class,'indexLogin'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate'])->middleware('guest');
Route::post('/logout',[LoginController::class,'logout']);



Route::get('/register',[LoginController::class,'indexRegister'])->name('register')->middleware('guest');
Route::post('/register',[LoginController::class,'storeRegister'])->middleware('guest');

Route::get('/admin/user',[RegisterController::class,'index'])->name('user')->middleware('admin');
Route::get('/admin/user/create',[RegisterController::class,'create'])->middleware('admin');
Route::post('/admin/user',[RegisterController::class,'store'])->middleware('admin');
Route::get('/admin/user/{id}/edit',[RegisterController::class,'edit'])->middleware('admin');
Route::post('/admin/user/{id}',[RegisterController::class,'update'])->middleware('admin');
Route::get('/admin/user/{id}',[RegisterController::class,'destroy'])->middleware('admin');

Route::get('/admin/room-facility',[RoomFacilityController::class,'index'])->name('room-facility')->middleware('admin');
Route::get('/admin/room-facility/create',[RoomFacilityController::class,'create'])->middleware('admin');
Route::post('/admin/room-facility',[RoomFacilityController::class,'store'])->middleware('admin');
Route::get('/admin/room-facility/{id}/edit',[RoomFacilityController::class,'edit'])->middleware('admin');
Route::post('/admin/room-facility/{id}',[RoomFacilityController::class,'update'])->middleware('admin');
Route::get('/admin/room-facility/{id}',[RoomFacilityController::class,'destroy'])->middleware('admin');

Route::get('/admin/public-facility',[PublicFacilityController::class,'index'])->name('public-facility')->middleware('admin');
Route::get('/admin/public-facility/create',[PublicFacilityController::class,'create'])->middleware('admin');
Route::post('/admin/public-facility',[PublicFacilityController::class,'store'])->middleware('admin');
Route::get('/admin/public-facility/{id}/edit',[PublicFacilityController::class,'edit'])->middleware('admin');
Route::post('/admin/public-facility/{id}',[PublicFacilityController::class,'update'])->middleware('admin');
Route::get('/admin/public-facility/{id}',[PublicFacilityController::class,'destroy'])->middleware('admin');

Route::get('/admin/room',[RoomController::class,'index'])->name('room')->middleware('admin');
Route::get('/admin/room/create',[RoomController::class,'create'])->middleware('admin');
Route::post('/admin/room',[RoomController::class,'store'])->middleware('admin');
Route::get('/admin/room/{id}/edit',[RoomController::class,'edit'])->middleware('admin');
Route::post('/admin/room/{id}',[RoomController::class,'update'])->middleware('admin');
Route::get('/admin/room/{id}',[RoomController::class,'destroy'])->middleware('admin');

Route::get('/admin/booking',[BookingController::class,'index'])->name('bookingAdmin')->middleware('admin');
Route::get('/admin/booking/create',[BookingController::class,'create'])->middleware('admin');
Route::post('/admin/booking',[BookingController::class,'store'])->middleware('admin');
Route::get('/admin/booking/{id}/edit',[BookingController::class,'edit'])->middleware('admin');
Route::post('/admin/booking/{id}',[BookingController::class,'update'])->middleware('admin');
Route::get('/admin/booking/{id}',[BookingController::class,'destroy'])->middleware('admin');
Route::get('/admin/booking/filter',[BookingController::class,'filter'])->middleware('admin');

Route::get('/receptionist/booking',[ReceptionistBookingController::class,'index'])->name('bookingReceptionist')->middleware('receptionist');
Route::get('/receptionist/booking/create',[ReceptionistBookingController::class,'create'])->middleware('receptionist');
Route::get('/receptionist/booking/filter',[ReceptionistBookingController::class,'filter'])->middleware('receptionist');
Route::post('/receptionist/booking',[ReceptionistBookingController::class,'store'])->middleware('receptionist');
Route::get('/receptionist/booking/{id}/edit',[ReceptionistBookingController::class,'edit'])->middleware('receptionist');
Route::post('/receptionist/booking/{id}',[ReceptionistBookingController::class,'update'])->middleware('receptionist');
Route::get('/receptionist/booking/{id}',[ReceptionistBookingController::class,'destroy'])->middleware('receptionist');

