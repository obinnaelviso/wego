<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingTimeRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\BookingTime;
use App\Http\Resources\BookingTime\BookingTimeCollection;
use Illuminate\Http\Request;

class BookingTimeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }
    
    // Show all booking times
    public function index()
    {
        return BookingTimeCollection::collection(BookingTime::all());
    }

    // Add Booking time
    public function add(BookingTimeRequest $request)
    {
        $booking_time = new BookingTime;
        $booking_time->name = $request->booking_type;
        $booking_time->duration = $request->booking_hours;
        $booking_time->save();
        return response(['data' => new BookingTimeCollection($booking_time)],Response::HTTP_CREATED);
    }

    // Update booking time
   public function update(Request $request, BookingTime $bookingTime)
    {
        $bookingTime->update($request->all());
        return response(['data' => new BookingTimeCollection($bookingTime)],Response::HTTP_CREATED);
    }

    // Delete booking time
    // public function destroy(BookingTime $bookingTime)
    // {
    //     $bookingTime->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
