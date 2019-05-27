<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraHourRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\ExtraHour;
use App\Model\Customer;
use App\Model\Booking;
use App\Http\Resources\ExtraHourResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ExtraHourController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function all() {
        return ['message' => 200, 
                'error' => [], 
                'data' => ExtraHourResource::collection(ExtraHour::all())];
    }

    public function show_customer(Customer $customer)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => ExtraHourResource::collection($customer->extra_hours)];
    }

    public function index(Customer $customer, Booking $booking) {
        $extraHour = ExtraHour::where('customer_id', $customer->id)
                            ->where('booking_id', $booking->id)->get();
        return ['message' => 200, 
                'error' => [], 
                'data' => ExtraHourResource::collection($extraHour)];
    }

    // add extra hour 
    public function add(ExtraHourRequest $request, Customer $customer, Booking $booking)
    {
        $extraHour = new ExtraHour;
        $extraHour->customer_id = $customer->id;
        $extraHour->booking_id = $booking->id;
        $extraHour->cost_perHour = $request->cost_per_hr;
        $extraHour->hours = $request->total_hours;
        $extraHour->cost = $request->cost_per_hr * $request->total_hours;
        $extraHour->save();
        return response(['message' => 202, 
                        'error' => [], 
                        'data' => new ExtraHourResource($extraHour)],Response::HTTP_OK);
    }

    // Show a particular extra hour
    public function show(Customer $customer, Booking $booking, ExtraHour $extraHour)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => new ExtraHourResource($extraHour)];
    }
    
    // update details of extra hour
    public function update(ExtraHourRequest $request, Customer $customer, Booking $booking, ExtraHour $extraHour)
    {
        $extraHour->customer_id = $customer->id;
        $extraHour->booking_id = $booking->id;
        $extraHour->cost_perHour = $request->cost_per_hr;
        $extraHour->hours = $request->total_hours;
        $extraHour->cost = $request->cost_per_hr * $request->total_hours;
        $extraHour->save();
        return response(['message' => 206, 
                        'error' => [], 
                        'data' => new ExtraHourResource($extraHour)],Response::HTTP_OK);
    }
}
