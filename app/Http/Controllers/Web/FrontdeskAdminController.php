<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Model\Driver;
use App\Model\Booking;
use App\Model\CarModel;
use App\Model\Customer;
use App\Http\Controllers\Controller;

class FrontdeskAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:frontdeskAdmin');
    }
    public function index()
    {
        $new_drivers = Driver::where('account_status', 0)->get();
        $new_bookings = Booking::where('status', 0)->get();
        $new_cars = CarModel::where('status', 0)->get();
        $registered_customers = Customer::all();

        return view('frontdeskAdmin.home', compact(['new_drivers','new_bookings','new_cars','registered_customers']));
    }

    // Display the information of a driver
    public function view_driver(Driver $driver)
    {
        $car_model = $driver->car_models()->first();
        return view('frontdeskAdmin.view_driver', compact(['driver','car_model']));
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
    	$bookings = Booking::where('status', 0)->orderBy('created_at','asc')->paginate(20);
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
    	$drivers_cars = CarModel::where('name', $booking->car_model->name)->get();
        // return $drivers_cars;
        return view('frontdeskAdmin.drivers_cars', compact(['drivers_cars','booking']));
    }

    // Booking status -- 3 -- Active booking
    // Car Model status -- 2 -- Booked 
    // Drivers status -- 3 -- Booked
    public function send_driver(Booking $booking, Driver $driver)
    {
    	$booking->status = 3;
    	$booking->driver_id = $driver->id;
        $car_model = CarModel::where('driver_id', $driver->id)->first();
        $car_model->status = 2;
    	$driver->account_status = 3;
        $driver->save();
        $car_model->save();
    	$booking->save();
    	session()->flash('alert', 'Driver assigned to this booking!');
    	return redirect()->route('frontdesk_assign_drivers');
    }

    // Show Active bookings
        // Booking status -- 3 -- Active booking
    public function active_bookings()
    {
        $bookings = Booking::where('status', 3)->orderBy('updated_at','asc')->paginate(20);
        return view('frontdeskAdmin.active_bookings', compact('bookings'));
    }

    // Booking status -- 6 -- Cancel booking
    // Car Model status -- 1 -- Verified 
    // Drivers status -- 2 -- Verified
    public function cancel_booking(Booking $booking)
    {
        $driver = Driver::find($booking->driver_id);
        $booking->status = 6;
        $car_model = CarModel::where('driver_id', $booking->driver_id)->first();
        $car_model->status = 1;
        $driver->account_status = 2;
        $driver->save();
        // $car_model->save();
        $booking->save();
        session()->flash('alert', 'Booking cancelled!');
        return redirect()->route('frontdesk_active_bookings');
    }

    // Show Completed bookings
        // Booking status -- 4 -- Completed booking
    public function completed_bookings()
    {
        $bookings = Booking::where('status', 4)->orderBy('updated_at','desc')->paginate(20);
        return view('frontdeskAdmin.completed_bookings', compact('bookings'));
    }

    // Show Completed bookings
        // Booking status -- 5 -- Reviewed booking
    public function reviewed_bookings()
    {
        $bookings = Booking::where('status', 5)->orderBy('updated_at','desc')->paginate(20);
        return view('frontdeskAdmin.reviewed_bookings', compact('bookings'));
    }

    // Show Cancelled bookings
        // Booking status -- 6 -- Cancelled booking
    public function cancelled_bookings()
    {
        $bookings = Booking::where('status', 6)->orderBy('updated_at','desc')->paginate(20);
        return view('frontdeskAdmin.cancelled_bookings', compact('bookings'));
    }

    // View booking details
    public function view_booking(Booking $booking)
    {
        return view('frontdeskAdmin.view_booking', compact('booking'));
    }
}
