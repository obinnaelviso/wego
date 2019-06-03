<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Model\Driver;
use App\Model\Booking;
use App\Model\Car;
use App\Http\Controllers\Controller;

class FrontdeskAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:frontdeskAdmin');
    }
    public function index()
    {
        return view('frontdeskAdmin.home');
    }

    // Display the information of a driver
    public function view_driver(Driver $driver)
    {
        $car = $driver->cars()->first();
        return view('frontdeskAdmin.view_driver', compact(['driver','car']));
    }

    // Display the newly registered drivers
    public function new_drivers()
    {
    	$drivers = Driver::where('account_status', 0)->orderBy('id','desc')->paginate(5);
        return view('frontdeskAdmin.new_drivers', compact('drivers'));
    }

    // Set driver account status as interviewed -- 3
    public function send_interview(Driver $driver)
    {
    	$driver->account_status = 1;
    	$driver->save();
    	session()->flash('alert', 'Interview request sent!');
    	return redirect()->route('frontdesk_new_drivers');
    }

    // Display the newly registered drivers
    public function interview_drivers()
    {
    	$drivers = Driver::where('account_status', 1)->orderBy('updated_at','asc')->paginate(5);
        return view('frontdeskAdmin.interview_drivers', compact('drivers'));
    }

    // Set driver account status as verified -- 2
    public function send_verified(Driver $driver)
    {
    	$driver->account_status = 2;
    	$driver->save();
    	session()->flash('alert', 'This driver is verified!');
        return redirect()->route('frontdesk_interview_drivers');
    }

    // Display the newly registered drivers
    public function verified_drivers()
    {
    	$drivers = Driver::where('account_status', 2)
    					->orWhere('account_status', 4)->orderBy('updated_at','asc')->paginate(10);
        return view('frontdeskAdmin.verified_drivers', compact('drivers'));
    }

    // Set driver account status as blocked  -- 4
    public function send_block(Driver $driver)
    {
    	$driver->account_status = 4;
    	$driver->save();
    	session()->flash('alert', 0);
    	return back();
    }

    // Set driver account status as verified  -- 2
    public function send_unblock(Driver $driver)
    {
    	$driver->account_status = 2;
    	$driver->save();
    	session()->flash('alert', 1);
    	return back();
    }

    // Bookings
    	// Pending bookings
    public function pending_bookings()
    {
    	$bookings = Booking::where('status', 0)->orderBy('created_at','asc')->paginate(10);
        return view('frontdeskAdmin.pending_bookings', compact('bookings'));
    }

    public function confirm_payment(Booking $booking)
    {
    	$booking->status = 1;
    	$booking->save();
    	session()->flash('alert', 'Payment confirmed for this booking!');
    	return back();
    }

    public function assign_drivers()
    {
    	$bookings = Booking::where('status', 1)->orderBy('updated_at','asc')->paginate(10);
        return view('frontdeskAdmin.assign_drivers', compact('bookings'));
    }

    public function drivers_cars(Booking $booking)
    {
    	$drivers_cars = Car::all();
        return $drivers_cars;
        // return view('frontdeskAdmin.drivers_cars', compact(['drivers_cars', 'booking']));
    }

    // Booking status -- 2 -- Active booking
    // Drivers status -- 3 -- Assigned
    public function send_driver(Booking $booking, Driver $driver)
    {
    	$booking->status = 2;
    	$booking->driver_id = $driver->id;
    	$driver->status = 3;
    	$booking->save();
    	session()->flash('alert', 'Driver assigned to this booking!');
    	return redirect()->route('frontdesk_assign_drivers');
    }

}
