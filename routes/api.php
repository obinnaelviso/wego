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
Route::group(['prefix'=>'car-category/{car_category}/car-model/{car_model}'], function() {
	Route::get('/cars','CarController@index')->name('cars.index');
	Route::get('/cars/{car}','CarController@show')->name('cars.show');
	Route::post('/cars','CarController@add');
});

// Car Category Route
Route::get('/car-categories','CarCategoryController@index')->name('car-categories.index');
Route::post('/car-categories/','CarCategoryController@add');
Route::put('/car-categories/{car_category}','CarCategoryController@update');

// Booking Routes
Route::group(['prefix'=>'customers/{customer}'], function() {
	Route::get('/bookings','BookingController@index')->name('bookings.index');
	Route::post('/bookings/','BookingController@add');
	Route::put('/bookings/{booking}','BookingController@update');
});
Route::get('/bookings', function () { 
    return BookingCollection::collection(Booking::paginate(7));
}); // Shows all bookings


// Booking Time Routes
Route::get('/booking-times', 'BookingTimeController@index');
Route::post('/booking-times', 'BookingTimeController@add');
Route::put('/booking-times/{booking_time}', 'BookingTimeController@update');

// -----------------------------{::::: Reviews Route :::::}----------------------------- //
// Route::group(['prefix'=>'customers'], function() {
// 	Route::apiResource('/{customer}/reviews','ReviewController');
// });
Route::get('customers/{customer}/reviews','ReviewController@index')->name('reviews.index');
Route::group(['prefix'=>'customers/{customer}/bookings/{booking}'], function() {
	Route::get('/reviews/{review}','ReviewController@show');
	Route::post('/reviews','ReviewController@add');
	Route::put('/reviews/{review}','ReviewController@update');
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

// -----------------------------{::::: Notifications Route :::::}----------------------------- //
Route::get('/notifications','NotificationController@index')->name('notifications.index');
Route::group(['prefix'=>'customers/{customer}'], function() {
	Route::get('/notifications','NotificationController@customer_notifications')->name('notifications.customer-notifications');
	Route::get('/notifications/{notification}','NotificationController@show')->name('notifications.show');
	Route::post('/notifications','NotificationController@add');
	Route::put('/notifications/{notification}','NotificationController@update');
});