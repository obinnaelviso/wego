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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return ExtraHourCollection::collection(ExtraHour::paginate(7));
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
    public function store(ExtraHourRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ExtraHour  $extraHour
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraHour $extraHour)
    {
        return new ExtraHourResource($extraHour);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ExtraHour  $extraHour
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtraHour $extraHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ExtraHour  $extraHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExtraHour $extraHour)
    {
        $extraHour->update($request->all());
        return response(['data' => new ExtraHourResource($extraHour)],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ExtraHour  $extraHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtraHour $extraHour)
    {
        $extraHour->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
