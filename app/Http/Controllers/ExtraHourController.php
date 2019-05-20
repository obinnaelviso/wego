<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraHourRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\ExtraHour;
use App\Http\Resources\ExtraHour\ExtraHourCollection;
use App\Http\Resources\ExtraHour\ExtraHourResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ExtraHourController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }
    
    public function index()
    {
        return ExtraHourCollection::collection(ExtraHour::paginate(7));
    }

    // add extra hour 
    public function add(ExtraHourRequest $request)
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
    public function show(ExtraHour $extraHour)
    {
        return new ExtraHourResource($extraHour);
    }
    
    // update details of extra hour
    public function update(Request $request, ExtraHour $extraHour)
    {
        $extraHour->update($request->all());
        return response(['data' => new ExtraHourResource($extraHour)],Response::HTTP_CREATED);
    }
    
    // public function destroy(ExtraHour $extraHour)
    // {
    //     //
    // }
}
