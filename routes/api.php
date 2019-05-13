<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Customer Route
Route::apiResource('/customers', 'CustomerController');

// Car Model Route
Route::group(['prefix'=>'car-categories'], function() {
	Route::apiResource('/{car_category}/car-models','CarModelController');
});

// Cars Route
Route::apiResource('/cars','CarController');

// Car Category Route
Route::apiResource('/car-categories','CarCategoryController');

// Booking Routes
Route::group(['prefix'=>'customers'], function() {
	Route::apiResource('/{customer}/bookings','BookingController');
});

// Booking Time Routes
Route::apiResource('/booking-times', 'BookingTimeController');

// Review Routes
Route::group(['prefix'=>'customers'], function() {
	Route::apiResource('/{customer}/reviews','ReviewController');
});

// Extra Hours Route
Route::group(['prefix'=>'bookings'], function() {
	Route::apiResource('/{booking}/extra-hours','ExtraHourController');
});

