<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingTimeRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\BookingTime;
use App\Http\Resources\BookingTimeResource;
use Illuminate\Http\Request;

class BookingTimeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    // Show all booking times
    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => BookingTimeResource::collection(BookingTime::all())];
    }

    // Add Booking time
    public function add(BookingTimeRequest $request)
    {
        $booking_time = new BookingTime;
        $booking_time->name = $request->booking_type;
        $booking_time->duration = $request->booking_hours;
        $booking_time->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new BookingTimeResource($booking_time)],Response::HTTP_OK);
    }

    // Update booking time
   public function update(BookingTimeRequest $request, BookingTime $bookingTime)
    {
        $booking_time = new BookingTime;
        $booking_time->name = $request->booking_type;
        $booking_time->duration = $request->booking_hours;
        $booking_time->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new BookingTimeResource($booking_time)],Response::HTTP_OK);
    }
}
