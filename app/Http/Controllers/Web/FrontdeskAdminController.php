<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Model\Driver;
use App\Model\CarDriver;
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

    /*------------------------------------* Driver *-------------------------------------*/
    // Display the information of a driver
    public function view_driver(Driver $driver)
    {
        $car = $driver->car_drivers()->first();
        return view('frontdeskAdmin.view_driver', compact(['driver','car']));
    }

    // Display the newly registered drivers
    // Driver account status -- 0 -- new|unverified
    public function new_drivers()
    {
    	$drivers = Driver::where('account_status', 0)->orderBy('id','desc')->paginate(20);
        return view('frontdeskAdmin.new_drivers', compact('drivers'));
    }

    // Set driver account status as interviewed
    // Driver account status -- 1 -- interviewed
    public function send_interview(Driver $driver)
    {
    	$driver->account_status = 1;
    	$driver->save();
    	session()->flash('alert', 'Interview request sent to driver!');
    	return redirect()->route('frontdesk_new_drivers');
    }

    // Display the newly interviewed drivers
    // Driver account status -- 1 -- interviewed
    public function interview_drivers()
    {
    	$drivers = Driver::where('account_status', 1)->orderBy('updated_at','asc')->paginate(20);
        return view('frontdeskAdmin.interview_drivers', compact('drivers'));
    }

    // Set driver account status as verified
    // Driver account status -- 2 -- verified
    public function send_verified(Driver $driver)
    {
    	$driver->account_status = 2;
    	$driver->save();
    	session()->flash('alert', 'This Driver Account is Verified!');
        return redirect()->route('frontdesk_interview_drivers');
    }

    // Display the verified drivers
    // Driver account status -- 2 -- verified
    public function verified_drivers()
    {
    	$drivers = Driver::where('account_status', 2)->orderBy('updated_at','asc')->paginate(20);
        return view('frontdeskAdmin.verified_drivers', compact('drivers'));
    }

    // Set driver account status as blocked  -- 4
    // Driver account status -- 4 -- blocked
    public function send_block(Driver $driver)
    {
    	$driver->account_status = 4;
    	$driver->save();
    	session()->flash('alert', 'Driver account suspended!');
    	return back();
    }

    // Display the blocked drivers
    // Driver account status -- 4 -- blocked
    public function blocked_drivers()
    {
        $drivers = Driver::where('account_status', 4)->orderBy('updated_at','desc')->paginate(20);
        return view('frontdeskAdmin.blocked_drivers', compact('drivers'));
    }

    // Set driver account status as verified  -- 2
    public function send_unblock(Driver $driver)
    {
    	$driver->account_status = 2;
    	$driver->save();
    	session()->flash('alert', 'Driver Account unblocked!');
    	return back();
    }

    // Display the booked drivers
    // Driver account status -- 3 -- booked
    public function booked_drivers()
    {
        $drivers = Driver::where('account_status', 3)->orderBy('updated_at','asc')->paginate(20);
        return view('frontdeskAdmin.booked_drivers', compact('drivers'));
    }

    // Display the rejected drivers
    // Driver account status -- -1 -- booked
    public function rejected_drivers()
    {
        $drivers = Driver::where('account_status', -1)
                        ->orWhere('account_status', -2)->orderBy('updated_at','desc')->paginate(20);
        return view('frontdeskAdmin.rejected_drivers', compact('drivers'));
    }

    // Set driver account status as verified  -- 2
    public function reject_driver(Driver $driver, $code)
    {
        $driver->account_status = $code;
        $driver->save();
        session()->flash('alert_reject', 'Driver Registration Rejected!');
        return back();
    }



    /*------------------------------------* Bookings *-------------------------------------*/
    	// Pending bookings
    public function pending_bookings()
    {
    	$bookings = Booking::where('status', 0)->orderBy('created_at','asc')->paginate(20);
        return view('frontdeskAdmin.pending_bookings', compact('bookings'));
    }

        // Confirm the payment of customer
    public function confirm_payment(Booking $booking)
    {
    	$booking->status = 1;
    	$booking->save();
    	session()->flash('alert', 'Payment confirmed for this booking!');
    	return back();
    }

        // Assign driver to a booking
    public function assign_drivers()
    {
    	$bookings = Booking::where('status', 1)->orderBy('updated_at','asc')->paginate(20);
        return view('frontdeskAdmin.assign_drivers', compact('bookings'));
    }

        // show available drivers by the car chosen by the customer
    public function drivers_cars(Booking $booking)
    {
    	// $drivers_cars = CarDriver::where('car_model_id', $booking->car_model_id)
     //                            ->where('status', 1)
     //                            ->where('colour', $booking->car_colour)
     //                            ->where('year', $booking->car_year)->get();
        $drivers_cars = CarDriver::where('car_model_id', $booking->car_model_id)
                                ->where('status', 1)->get();
        // return $drivers_cars;
        return view('frontdeskAdmin.drivers_cars', compact(['drivers_cars', 'booking']));
    }

    // Booking status -- 2 -- Driver assigned
    // Car Model status -- 2 -- Booked 
    // Drivers status -- 3 -- Booked
    public function send_driver(Booking $booking, Driver $driver)
    {
    	$booking->status = 2;
    	$booking->driver_id = $driver->id;
        $car_driver = CarDriver::where('driver_id', $driver->id)->first();
        $car_driver->status = 2;
    	$driver->account_status = 3;
        $driver->save();
        $car->save();
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
        $car_driver = CarDriver::where('driver_id', $booking->driver_id)->first();
        $car_driver->status = 1;
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



    /*------------------------------------* Car *-------------------------------------*/
        // Show unverified cars
        // Car status -- 0 -- unverified
    public function new_cars()
    {
        $cars = CarDriver::where('status', 0)->orderBy('created_at','desc')->paginate(20);
        return view('frontdeskAdmin.new_cars', compact('cars'));
    }

        // Verify Cars
        // Car status -- 1 --verify
    public function verify_car(CarDriver $car_driver)
    {
        $car_driver->status = 1;
        $car_driver->save();
        session()->flash('alert', 'Car Verified!');
        return back();
    }

        // Reject / Ban Car
        // Car status -- -2 --rejected
        // Car status -- -1 --banned
    public function reject_car(CarDriver $car_driver, $code)
    {
        $car_driver->status = $code;
        $car_driver->save();
        if($code == -2)
            session()->flash('alert_reject', 'Car Rejected!');
        else
            session()->flash('alert_reject', 'Car Banned!');
        return back();
    }

    // View Car
    public function view_car(CarDriver $car)
    {
        return view('frontdeskAdmin.view_car', compact('car'));
    }

    // Show verified cars
        // Car status -- 1 -- verified
    public function verified_cars()
    {
        $cars = CarDriver::where('status', 1)->orderBy('updated_at','desc')->paginate(20);
        return view('frontdeskAdmin.verified_cars', compact('cars'));
    }

    // Show rejected cars
        // Car status -- -2 -- rejected
    public function rejected_cars()
    {
        $cars = CarDriver::where('status', -2)->orderBy('updated_at','desc')->paginate(20);
        return view('frontdeskAdmin.rejected_cars', compact('cars'));
    }

        // Show banned cars
        // Car status -- -1 -- banned
    public function banned_cars()
    {
        $cars = CarDriver::where('status', -1)->orderBy('updated_at','desc')->paginate(20);
        return view('frontdeskAdmin.banned_cars', compact('cars'));
    }
        // Unban a car
        // Car status -- 1 -- verified
    public function unban_car(CarDriver $car_driver)
    {
        $car_driver->status = 1;
        $car_driver->save();
        session()->flash('alert', 'Car Unbanned!');
        return back();
    }
}
