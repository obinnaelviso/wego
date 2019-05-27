<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Booking;
use App\Model\Customer;
use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BookingController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    // Show all bookings
    public function all() {
        return ['message' => 200, 
                'error' => [], 
                'data' => BookingResource::collection(Booking::all())];
    }
    
    // show all bookings by customer
    public function index(Customer $customer)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => BookingResource::collection($customer->bookings)];
    }

   // Add new booking
    public function add(BookingRequest $request, Customer $customer)
    {
        $booking = new Booking;
        $booking->car_id = $request->car_id;
        $booking->booking_time_id = $request->booking_time_id;
        // $booking->date = date('Y-m-d H:i:s');
        $booking->time = $request->date;
        $booking->cost = $request->total_cost;
        $booking->pts = $request->points;
        $booking->location = $request->pickup_address;
        $booking->location_link = $request->google_map_link;
        // Temp. disable foreign key check to insert car_id and booking_time_id
        Schema::disableForeignKeyConstraints();
        $customer->bookings()->save($booking);
        Schema::enableForeignKeyConstraints();
        // Enable back after performing operations
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new BookingResource($booking)],Response::HTTP_OK);
    }

    // Show a particular booking
    public function show(Customer $customer, Booking $booking)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => new BookingResource($booking)];
    }

    // update booking records
    public function update(BookingRequest $request, Customer $customer, Booking $booking)
    {
        $booking->customer_id = $customer->id;
        $booking->car_id = $request->car_id;
        $booking->booking_time_id = $request->booking_time_id;
        // $booking->date = date('Y-m-d H:i:s');
        $booking->time = $request->date;
        $booking->cost = $request->total_cost;
        $booking->pts = $request->points;
        $booking->location = $request->pickup_address;
        $booking->location_link = $request->google_map_link;
        $booking->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new BookingResource($booking)],Response::HTTP_OK);
    }

    public function action(Customer $customer, Booking $booking, $action)
    {
        if($action == "completed") {
            $booking->status = $action;
            $customer->pts += $booking->pts;
            $customer->save();
            $booking->save();
            return $action;
        } else if($action == "cancelled") {
            $booking->status = $action;
            $booking->save();
            return $action;
        } else if($action == "removed") {
            $booking->status = $action;
            $booking->save();
            return $action;
        } else {
            return null;
        }
    }
}
