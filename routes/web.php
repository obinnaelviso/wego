<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Handle registration for drivers and frontdesk admin
Route::get('/drivers/register', 'Web\Auth\RegisterController@register_driver');
Route::get('/frontdesk-admin/register', 'Web\Auth\RegisterController@register_frontdesk_admin');
Route::post('/drivers/register', 'Web\Auth\RegisterController@add_driver')->name('registerDriver');
Route::post('/frontdesk-admin/register', 'Web\Auth\RegisterController@add_frontdeskAdmin')->name('registerFrontdesk');

// Login - Logout
Route::get('/frontdesk-admin/login', 'Web\Auth\LoginController@frontdesk_index')->name('frontdesk_index');
Route::post('/frontdesk-admin/', 'Web\Auth\LoginController@frontdesk_login')->name('frontdesk_login');
Route::get('/frontdesk-admin/logout', 'Web\Auth\LoginController@logout')->name('logout');

// Frontdesk Admin Dashboard
Route::get('/frontdesk-admin/dashboard/', 'Web\FrontdeskAdminController@index')->name('frontdesk_home');

// Frontdesk Admin show driver details
Route::get('/frontdesk-admin/dashboard/drivers/{driver}/view', 'Web\FrontdeskAdminController@view_driver')->name('frontdesk_view_driver');

// Show new drivers, set interview 
Route::get('/frontdesk-admin/dashboard/new-drivers', 'Web\FrontdeskAdminController@new_drivers')->name('frontdesk_new_drivers');
Route::post('/frontdesk-admin/dashboard/new-drivers/{driver}/action', 'Web\FrontdeskAdminController@send_interview')->name('frontdesk_driver_interview');

// Show interviewed drivers, set verified 
Route::get('/frontdesk-admin/dashboard/interview-drivers', 'Web\FrontdeskAdminController@interview_drivers')->name('frontdesk_interview_drivers');
Route::post('/frontdesk-admin/dashboard/interview-drivers/{driver}/action', 'Web\FrontdeskAdminController@send_verified')->name('frontdesk_driver_verified');

// Verified Drivers, perform block and unblock functions
Route::get('/frontdesk-admin/dashboard/verified-drivers', 'Web\FrontdeskAdminController@verified_drivers')->name('frontdesk_verified_drivers');
Route::post('/frontdesk-admin/dashboard/verified-drivers/{driver}/action/block', 'Web\FrontdeskAdminController@send_block')->name('frontdesk_driver_block');
Route::post('/frontdesk-admin/dashboard/verified-drivers/{driver}/action/unblock', 'Web\FrontdeskAdminController@send_unblock')->name('frontdesk_driver_unblock');

// Booking
// Show pending Bookings, set confirm payment 
Route::get('/frontdesk-admin/dashboard/pending-bookings', 'Web\FrontdeskAdminController@pending_bookings')->name('frontdesk_pending_bookings');
Route::post('/frontdesk-admin/dashboard/pending-bookings/{booking}/confirm-payment', 'Web\FrontdeskAdminController@confirm_payment')->name('frontdesk_confirm_payment');

// Assign-bookings
Route::get('/frontdesk-admin/dashboard/assign-drivers', 'Web\FrontdeskAdminController@assign_drivers')->name('frontdesk_assign_drivers');
Route::post('/frontdesk-admin/dashboard/assign-drivers/{booking}/drivers-cars', 'Web\FrontdeskAdminController@drivers_cars')->name('frontdesk_drivers_cars');
Route::post('/frontdesk-admin/dashboard/assign-drivers/{booking}/{driver}/action', 'Web\FrontdeskAdminController@send_driver')->name('frontdesk_send_driver');

	// View-booking
Route::get('/frontdesk-admin/dashboard/bookings/{booking}/view', 'Web\FrontdeskAdminController@view_booking')->name('frontdesk_view_booking');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
