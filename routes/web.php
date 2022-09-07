<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PublicFacilityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomFacilityController;

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

Route::get('/', function () {
    return view('layout.main');
});

Route::get('/admin/dashboard',[AdminController::class,'index']);

Route::get('/admin/room-facility',[RoomFacilityController::class,'index'])->name('room-facility');
Route::get('/admin/room-facility/create',[RoomFacilityController::class,'create']);
Route::post('/admin/room-facility',[RoomFacilityController::class,'store']);
Route::get('/admin/room-facility/{id}/edit',[RoomFacilityController::class,'edit']);
Route::post('/admin/room-facility/{id}',[RoomFacilityController::class,'update']);
Route::get('/admin/room-facility/{id}',[RoomFacilityController::class,'destroy']);

Route::get('/admin/public-facility',[PublicFacilityController::class,'index'])->name('public-facility');
Route::get('/admin/public-facility/create',[PublicFacilityController::class,'create']);
Route::post('/admin/public-facility',[PublicFacilityController::class,'store']);
Route::get('/admin/public-facility/{id}/edit',[PublicFacilityController::class,'edit']);
Route::post('/admin/public-facility/{id}',[PublicFacilityController::class,'update']);
Route::get('/admin/public-facility/{id}',[PublicFacilityController::class,'destroy']);

Route::get('/admin/room',[RoomController::class,'index'])->name('room');
Route::get('/admin/room/create',[RoomController::class,'create']);
Route::post('/admin/room',[RoomController::class,'store']);
Route::get('/admin/room/{id}/edit',[RoomController::class,'edit']);
Route::post('/admin/room/{id}',[RoomController::class,'update']);
Route::get('/admin/room/{id}',[RoomController::class,'destroy']);

Route::get('/admin/booking',[BookingController::class,'index'])->name('booking');
Route::get('/admin/booking/create',[BookingController::class,'create']);
Route::post('/admin/booking',[BookingController::class,'store']);
Route::get('/admin/booking/{id}/edit',[BookingController::class,'edit']);
Route::post('/admin/booking/{id}',[BookingController::class,'update']);
Route::get('/admin/booking/{id}',[BookingController::class,'destroy']);
