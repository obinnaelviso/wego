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

    public function index(Customer $customer)
    {
        return BookingResource::collection($customer->bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request, Customer $customer)
    {
        $booking = new Booking;
        $booking->car_id = $request->car_id;
        $booking->booking_time_id = $request->pickup_address;
        $booking->date = date('Y-m-d H:i:s');
        $booking->cost = $request->cost;
        $booking->status = $request->status;
        $booking->location = $request->location;
        $booking->location_link = $request->location_link;
        // Temp. disable foreign key check to insert car_id and booking_time_id
        Schema::disableForeignKeyConstraints();
        $customer->bookings()->save($booking);
        Schema::enableForeignKeyConstraints();
        // Enable back after performing operations
        return response(['data' => new BookingResource($booking)],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Booking $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Booking $booking)
    {
        $booking->update($request->all());
        return response(['data' => new BookingResource($booking)],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Booking $booking)
    {
        $booking->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
