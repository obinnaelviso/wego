<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingTimeRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\BookingTime;
use App\Http\Resources\BookingTime\BookingTimeCollection;
use Illuminate\Http\Request;

class BookingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookingTimeCollection::collection(BookingTime::all());
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
    public function store(BookingTimeRequest $request)
    {
        $booking_time = new BookingTime($request->all());
        $booking_time->save();
        return response(['data' => new BookingTimeCollection($booking_time)],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BookingTime  $bookingTime
     * @return \Illuminate\Http\Response
     */
    public function show(BookingTime $bookingTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BookingTime  $bookingTime
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingTime $bookingTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BookingTime  $bookingTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingTime $bookingTime)
    {
        $bookingTime->update($request->all());
        return response(['data' => new BookingTimeCollection($bookingTime)],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BookingTime  $bookingTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingTime $bookingTime)
    {
        $bookingTime->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
