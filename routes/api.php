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
Route::post('/car-makes/get-all','CarMakeController@all');
Route::group(['prefix'=>'car-categories'], function() {
	Route::post('/{car_category}/car-makes/get-all','CarMakeController@index')->name('car-makes.index');
	Route::post('/{car_category}/car-makes/add-new','CarMakeController@add');
	Route::post('/{car_category}/car-makes/{car_make}/edit-details','CarMakeController@update');
});

// -----------------------------{::::: Car Model Routes :::::}----------------------------- //
Route::post('/car-models/get-all', 'CarModelController@all');
Route::group(['prefix'=>'car-makes/{car_make}'], function() {
	Route::post('/car-models/get-all','CarModelController@index');
	Route::post('/car-models/{car_model}/show-details','CarModelController@show');
	Route::post('/car-models/{car_model}/edit-details','CarModelController@update');
	// Route::post('/car-models/{car_model}/action/{action}','CarModelController@action');
	Route::post('/car-models/add-new','CarModelController@add');
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
Route::post('/reviews/get-all','ReviewController@all');
Route::post('customers/{customer}/reviews/get-all','ReviewController@index')->name('reviews.index');
Route::group(['prefix'=>'customers/{customer}/bookings/{booking}'], function() {
	Route::post('/reviews/add-new','ReviewController@add');
	Route::post('/reviews/{review}/edit-details','ReviewController@update');
});

// -----------------------------{::::: Extra Hours Route :::::}----------------------------- //
// Show all extra-hours
Route::post('/extra-hours/get-all', 'ExtraHourController@all')->name('extra-hours.index');

// Show all extra-hours by customer id
Route::post('/customers/{customer}/extra-hours/get-all', 'ExtraHourController@show_customer')->name('extra-hour.show_customer');

Route::group(['prefix'=>'customers/{customer}/bookings/{booking}'], function() {
	// Show all extra-hours for a customer with a particular booking
	Route::post('/extra-hours/get-all', 'ExtraHourController@index');
	Route::post('/extra-hours/{extra_hour}/show-details', 'ExtraHourController@show');
	Route::post('/extra-hours/add-new', 'ExtraHourController@add');
	Route::post('/extra-hours/{extra_hour}/edit-details', 'ExtraHourController@update');
});

// -----------------------------{::::: Notifications Route :::::}----------------------------- //
// Show all notifications
Route::post('/notifications/get-all','NotificationController@all')->name('notifications.index');
// Show all notifications by their type
Route::post('/notification-types/{notification_type}/notifications/get-all','NotificationController@type')->name('notifications.type');
// Show all notifications by customer
Route::group(['prefix'=>'customers/{customer}/notification-types/{notification_type}'], function() {
	Route::post('/notifications/get-all','NotificationController@index')->name('notifications.customer-notifications');
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
Route::post('/notification-types/{notification_types}/edit-details','NotificationTypeController@update');

// -----------------------------{::::: Driver Routes :::::}----------------------------- //
Route::post('/drivers/get-all', 'DriverController@index');
Route::post('/drivers/{driver}/show-details', 'DriverController@show');
Route::post('/drivers/add-new', 'DriverController@add');
Route::post('/drivers/{driver}/edit-details', 'DriverController@update');
Route::post('/drivers/{driver}/action/{action}', 'DriverController@action');

// -----------------------------{::::: FrontDesk Admin Routes :::::}----------------------------- //
Route::post('/frontdesk-admins/get-all', 'FrontdeskAdminController@index');
Route::post('/frontdesk-admins/{frontdesk_admin}/show-details', 'FrontdeskAdminController@show');
Route::post('/frontdesk-admins/add-new', 'FrontdeskAdminController@add');
Route::post('/frontdesk-admins/{frontdesk_admin}/edit-details', 'FrontdeskAdminController@update');
Route::post('/frontdesk-admins/{frontdesk_admin}/action/{action}', 'FrontdeskAdminController@action');

// -----------------------------{::::: Location Routes :::::}----------------------------- //
Route::post('/locations/get-all', 'LocationController@index');
Route::post('/locations/add-new', 'LocationController@add');
Route::post('/locations/{location}/edit-details', 'LocationController@update');

// -----------------------------{::::: Issued Voucher Route :::::}----------------------------- //
Route::post('/issued-vouchers/get-all','IssuedVoucherController@index');
Route::post('/customers/{customer}/issued-vouchers/get-all','IssuedVoucherController@customers');
Route::post('/vouchers/{voucher}/issued-vouchers/get-all','IssuedVoucherController@vouchers');
Route::group(['prefix'=>'customers/{customer}/vouchers/{voucher}'], function() {
	Route::post('/issued-vouchers/{issued_voucher}/show-details', 'IssuedVoucherController@show');
	Route::post('/issued-vouchers/add-new', 'IssuedVoucherController@add');
	Route::post('/issued-vouchers/{issued_vouchers}/{$action}', 'IssuedVoucherController@action');
});

// -----------------------------{::::: Driver Location Route :::::}----------------------------- //
Route::post('/driver-locations/get-all','DriverLocationController@index');
Route::post('/drivers/{driver}/driver-locations/get-all','DriverLocationController@drivers');
Route::post('/locations/{location}/driver-locations/get-all','DriverLocationController@locations');
Route::post('/drivers/{driver}/locations/{location}/driver-locations/add-new', 'DriverLocationController@add');