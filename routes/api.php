<?php

use Illuminate\Http\Request;
use App\Http\Resources\Booking\BookingCollection;
use App\Model\Booking;

Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});

// -----------------------------{::::: Customer Routes :::::}----------------------------- //
Route::post('/customers/get-all', 'CustomerController@index');
Route::post('/customers/{customer}/show-details', 'CustomerController@show');
Route::post('/customers/add-new', 'CustomerController@add');
Route::post('/customers/{customer}/edit-details', 'CustomerController@update');
Route::post('/customers/{customer}/action/{action}', 'CustomerController@action');


// -----------------------------{::::: Car Model Routes :::::}----------------------------- //
Route::post('/car-models/get-all','CarModelController@all');
Route::group(['prefix'=>'car-categories'], function() {
	Route::post('/{car_category}/car-models/get-all','CarModelController@index')->name('car-models.index');
	Route::post('/{car_category}/car-models/add-new','CarModelController@add');
	Route::post('/{car_category}/car-models/{car_model}/edit-details','CarModelController@update');
});

// -----------------------------{::::: Cars Routes :::::}----------------------------- //
Route::post('/cars/get-all', 'CarController@all');
Route::group(['prefix'=>'car-categories/{car_category}/car-models/{car_model}'], function() {
	Route::post('/cars/get-all','CarController@index');
	Route::post('/cars/{car}/show-details','CarController@show');
	Route::post('/cars/{car}/edit-details','CarController@update');
	// Route::post('/cars/{car}/action/{action}','CarController@action');
	Route::post('/cars/add-new','CarController@add');
});

// -----------------------------{::::: Car Category Routes :::::}----------------------------- //
Route::post('/car-categories/get-all','CarCategoryController@index')->name('car-categories.index');
Route::post('/car-categories/add-new','CarCategoryController@add');
Route::post('/car-categories/{car_category}/edit-details','CarCategoryController@update');

// -----------------------------{::::: Booking Routes :::::}----------------------------- //
Route::post('/bookings/get-all', 'BookingController@all');
Route::group(['prefix'=>'customers/{customer}'], function() {
	Route::post('/bookings/get-all','BookingController@index')->name('bookings.index');
	Route::post('/bookings/add-new','BookingController@add');
	Route::post('/bookings/{booking}/edit-details','BookingController@update');
	Route::post('/bookings/{booking}/show-details','BookingController@show');
	Route::post('/bookings/{booking}/{action}','BookingController@action');
});



// -----------------------------{::::: Booking Time Routes :::::}----------------------------- //
Route::post('/booking-times/get-all', 'BookingTimeController@index');
Route::post('/booking-times/add-new', 'BookingTimeController@add');
Route::post('/booking-times/{booking_time}/edit-details', 'BookingTimeController@update');

// -----------------------------{::::: Reviews Route :::::}----------------------------- //
// Route::group(['prefix'=>'customers'], function() {
// 	Route::apiResource('/{customer}/reviews','ReviewController');
// });
Route::post('customers/{customer}/reviews/get-all','ReviewController@index')->name('reviews.index');
Route::group(['prefix'=>'customers/{customer}/bookings/{booking}'], function() {
	Route::post('/reviews/{review}/show-details','ReviewController@show');
	Route::post('/reviews/add-new','ReviewController@add');
	Route::post('/reviews/{review}/edit-details','ReviewController@update');
});

// -----------------------------{::::: Extra Hours Route :::::}----------------------------- //
// Show all extra-hours
Route::post('/extra-hours/get-all', 'ExtraHourController@index')->name('extra-hours.index');

// Show all extra-hours by customer id
Route::post('/customers/{customer}/extra-hours/show-customer', 'ExtraHourController@show_customer')->name('extra-hour.show_customer');

Route::group(['prefix'=>'customers/{customer}/bookings/{booking}'], function() {
	// Show all extra-hours for a customer with a particular booking
	Route::post('/extra-hours/show-customer-booking', 'ExtraHourController@show_customer_booking');
	Route::post('/extra-hours/{extra_hour}/show-details', 'ExtraHourController@show')->name('extra-hours.show');
	Route::post('/extra-hours/add-new', 'ExtraHourController@add');
	Route::post('/extra-hours/{extra_hour}/edit-details', 'ExtraHourController@update');
});

// -----------------------------{::::: Notifications Route :::::}----------------------------- //
// Show all notifications
Route::post('/notifications/get-all','NotificationController@index')->name('notifications.index');
// Show all notifications by their type
Route::post('/notification-types/{notification_type}/notifications/show-type','NotificationController@type')->name('notifications.type');
// Show all notifications by customer
Route::group(['prefix'=>'customers/{customer}/notification-types/{notification_type}'], function() {
	Route::post('/notifications/show-customer','NotificationController@customer_notifications')->name('notifications.customer-notifications');
	Route::post('/notifications/{notification}/show-details','NotificationController@show')->name('notifications.show');
	Route::post('/notifications/add-new','NotificationController@add');
});
// Read actions for notifications
Route::post('/notifications/{notification}/{action}', 'NotificationController@action');

// -----------------------------{::::: Voucher Route :::::}----------------------------- //
Route::post('/vouchers/get-all','VoucherController@index')->name('voucher.index');
Route::post('/vouchers/add-new','VoucherController@add');
Route::post('/vouchers/{voucher}/edit-details','VoucherController@update')->name('voucher.update');
Route::post('/vouchers/{voucher}/{action}','VoucherController@action');

// -----------------------------{::::: Points Route :::::}----------------------------- //
Route::post('/points/get-all','PointController@index')->name('voucher.index');
Route::post('/points/add-new','PointController@add');

// -----------------------------{::::: Notification Types Route :::::}----------------------------- //
Route::post('/notification-types/get-all','NotificationTypeController@index')->name('notification-types.index');
Route::post('/notification-types/add-new','NotificationTypeController@add');
Route::post('/notification-types/{notification-types}/edit-details','NotificationTypeController@update');