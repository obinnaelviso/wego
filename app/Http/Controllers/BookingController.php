<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Booking;
use App\Model\Customer;
use App\Http\Resources\Booking\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BookingController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }
    
    // show all bookings
    public function index(Customer $customer)
    {
        return BookingResource::collection($customer->bookings);
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
        $booking->status = $request->booking_stat;
        $booking->location = $request->pickup_address;
        $booking->location_link = $request->google_map_link;
        $booking->points = $request->booking_points;
        // Temp. disable foreign key check to insert car_id and booking_time_id
        Schema::disableForeignKeyConstraints();
        $customer->bookings()->save($booking);
        Schema::enableForeignKeyConstraints();
        // Enable back after performing operations
        return response(['data' => new BookingResource($booking)],Response::HTTP_CREATED);
    }

    // Show a particular booking
    public function show(Customer $customer, Booking $booking)
    {
        return new BookingResource($booking);
    }

    // update booking records
    public function update(Request $request, Customer $customer, Booking $booking)
    {
        //
        $booking->update($request->all());
        return response(['data' => new BookingResource($booking)],Response::HTTP_CREATED);
    }
    
    // Delete a booking detail
    // public function destroy(Customer $customer, Booking $booking)
    // {
    //     $booking->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
