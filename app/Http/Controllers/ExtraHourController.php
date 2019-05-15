<?php

namespace App\Http\Controllers;

use App\Model\ExtraHour;
use App\Http\Resources\ExtraHour\ExtraHourCollection;
use App\Http\Resources\ExtraHour\ExtraHourResource;
use Illuminate\Http\Request;

class ExtraHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ExtraHour  $extraHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtraHour $extraHour)
    {
        //
    }
}
