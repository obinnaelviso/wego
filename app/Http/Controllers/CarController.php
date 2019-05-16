<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Car;
use App\Model\CarCategory;
use App\Model\CarModel;
use App\Http\Resources\Car\CarCollection;
use App\Http\Resources\Car\CarResource;
use Illuminate\Http\Request;

class CarController extends Controller
{
     public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index(CarCategory $carCategory, CarModel $carModel)
    {
        return CarCollection::collection($carModel->cars);
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
    public function store(CarRequest $request, CarCategory $car_category, CarModel $car_model)
    {
        $car = new Car;
        $car->name = $request->name;
        $car->description = $request->description;
        $car->discount = $request->discount;
        $car->plate_number = $request->plate_numbe;
        $car->stock = $request->stock;
        $car->price = $request->price;
        $car_model->cars()->save($car);
        return response(['data' => new CarResource($car)],Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(CarCategory $carCategory, CarModel $carModel, Car $car)
    {
        return new CarResource($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarCategory $car_category, CarModel $car_model, Car $car)
    {
        $car->update($request->all());
        return response(['data' => new CarResource($car)],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarCategory $carCategory,CarModel $carModel, Car $car)
    {
        $car->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
