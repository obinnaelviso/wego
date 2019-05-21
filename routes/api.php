<?php

use Illuminate\Http\Request;
use App\Http\Resources\Booking\BookingCollection;
use App\Model\Booking;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Customer Route
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/{customer}', 'CustomerController@show')->name('customer.show');
Route::post('/customers', 'CustomerController@add');
Route::put('/customers/{customer}', 'CustomerController@update')->name('customer.update');

// Car Model Route
Route::group(['prefix'=>'car-category'], function() {
	Route::get('/{car_category}/car-models','CarModelController@index')->name('car-models.index');
	Route::post('/{car_category}/car-models','CarModelController@add');
	Route::put('/{car_category}/car-models/{car_model}','CarModelController@update');
});

// Cars Route
Route::group(['prefix'=>'car-category'], function() {
	Route::get('/{car_category}/car-model/{car_model}/cars','CarController@index')->name('cars.index');
	Route::get('/{car_category}/car-model/{car_model}/cars/{car}','CarController@show')->name('cars.show');
	Route::post('/{car_category}/car-model/{car_model}/cars','CarController@add');
});

// Car Category Route
Route::get('/car-categories','CarCategoryController@index')->name('car-categories.index');
Route::post('/car-categories/','CarCategoryController@add');
Route::put('/car-categories/{car_category}','CarCategoryController@update');

// Booking Routes
Route::group(['prefix'=>'customers'], function() {
	Route::get('/{customer}/bookings','BookingController@index')->name('bookings.index');
	Route::post('/{customer}/bookings/','BookingController@add');
	Route::put('/{customer}/bookings/{booking}','BookingController@update');
});
Route::get('/bookings', function () { 
    return BookingCollection::collection(Booking::paginate(7));
}); // Shows all bookings


// Booking Time Routes
Route::get('/booking-times', 'BookingTimeController@index');
Route::post('/booking-times', 'BookingTimeController@add');
Route::put('/booking-times/{booking_time}', 'BookingTimeController@update');

// Review Routes
// Route::group(['prefix'=>'customers'], function() {
// 	Route::apiResource('/{customer}/reviews','ReviewController');
// });
Route::group(['prefix'=>'customers'], function() {
	Route::get('/{customer}/reviews','ReviewController@index');
	Route::get('/{customer}/reviews/{review}','ReviewController@show');
	Route::post('/{customer}/reviews','ReviewController@add');
	Route::put('/{customer}/reviews/{review}','ReviewController@update');
});

// -----------------------------{::::: Extra Hours Route :::::}----------------------------- //
// Show all extra-hours
Route::get('/extra-hours', 'ExtraHourController@index')->name('extra-hours.index');

// Show all extra-hours by customer id
Route::get('/customers/{customer}/extra-hours', 'ExtraHourController@show_customer')->name('extra-hour.show_customer');

Route::group(['prefix'=>'customers/{customer}/bookings/{booking}'], function() {
	// Show all extra-hours for a customer with a particular booking
	Route::get('/extra-hours', 'ExtraHourController@show_customer_booking');
	Route::get('/extra-hours/{extra_hour}', 'ExtraHourController@show')->name('extra-hours.show');
	Route::post('/extra-hours', 'ExtraHourController@add');
	Route::put('/extra-hours/{extra_hour}', 'ExtraHourController@update');
});

