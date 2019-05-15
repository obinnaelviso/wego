<?php

use Illuminate\Http\Request;
use App\Http\Resources\Booking\BookingCollection;
use App\Model\Booking;

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

// Booking index rout
Route::get('/bookings', function () {
    return BookingCollection::collection(Booking::paginate(7));
});

// Booking Time Routes
Route::apiResource('/booking-times', 'BookingTimeController');

// Review Routes
Route::group(['prefix'=>'customers'], function() {
	Route::apiResource('/{customer}/reviews','ReviewController');
});

// Extra Hours Route
Route::apiResource('/extra-hours', 'ExtraHourController');

