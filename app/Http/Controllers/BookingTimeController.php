<?php

namespace App\Http\Controllers;

use App\Model\BookingTime;
use App\Http\Resources\BookingTime\BookingTimeCollection;
use Illuminate\Http\Request;

class BookingTimeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }
    
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BookingTime  $bookingTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingTime $bookingTime)
    {
        //
    }
}
