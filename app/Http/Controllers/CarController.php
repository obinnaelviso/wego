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
    public function store(CarRequest $request)
    {
        // $car = new Car;
        // $car->name = $request->name;
        // $car->car_model_id = $request->model;
        // $car->description = $request->description;
        // $car->plate_number = $request->password;
        // $car->stock = $request->stock;
        // $car->price = $request->price;
        // $car->save();
        // return response(['data' => new CustomerResource($customer)],Response::HTTP_CREATED);
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
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
