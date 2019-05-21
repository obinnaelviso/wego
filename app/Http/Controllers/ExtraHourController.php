<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraHourRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\ExtraHour;
use App\Model\Customer;
use App\Model\Booking;
use App\Http\Resources\ExtraHour\ExtraHourCollection;
use App\Http\Resources\ExtraHour\ExtraHourResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ExtraHourController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')
             ->except('index','show', 'show_customer','show_customer_booking');
    }
    
    public function index() {
        return ExtraHourCollection::collection(ExtraHour::paginate(7));
    }

    public function show_customer(Customer $customer)
    {
        return ExtraHourResource::collection($customer->extra_hours);
    }

    public function show_customer_booking(Customer $customer, Booking $booking) {
        $extraHour = ExtraHour::where('customer_id', $customer->id)
                            ->where('booking_id', $booking->id)->get();
        return ExtraHourResource::collection($extraHour);
    }

    // add extra hour 
    public function add(ExtraHourRequest $request, Customer $customer, Booking $booking)
    {
        $extraHour = new ExtraHour;
        $extraHour->customer_id = $request->customer_id;
        $extraHour->booking_id = $request->booking_id;
        $extraHour->cost_perHour = $request->cost_perHour;
        $extraHour->hours = $request->hours;
        $extraHour->cost = $request->cost;
        Schema::disableForeignKeyConstraints();
        $extraHour->save();
        Schema::enableForeignKeyConstraints();
        return response(['data' => new ExtraHourResource($extraHour)],Response::HTTP_CREATED);
    }

    // Show a particular extra hour
    public function show(Customer $customer, Booking $booking, ExtraHour $extraHour)
    {
        return new ExtraHourResource($extraHour);
    }
    
    // update details of extra hour
    public function update(Request $request, Customer $customer, Booking $booking, ExtraHour $extraHour)
    {
        $extraHour->update($request->all());
        return response(['data' => new ExtraHourResource($extraHour)],Response::HTTP_CREATED);
    }
    
    // public function destroy(ExtraHour $extraHour)
    // {
    //     //
    // }
}
