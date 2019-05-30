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

Route::get('/frontdesk-admin/dashboard/', 'Web\FrontdeskAdminController@index')->name('frontdesk_dashboard');