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

    // Add a car to database
    public function add(CarRequest $request, CarCategory $car_category, CarModel $car_model)
    {
        $car = new Car;
        $car->name = $request->car_name;
        $car->booking_percent = $request->percentage;
        $car->plate_number = $request->plate_no;
        $car->stock = $request->in_stock;
        $car->price = $request->cost;
        $car->colour = $request->color;
        $car->year = $request->car_year;
        $car_model->cars()->save($car);
        return response(['data' => new CarResource($car)],Response::HTTP_CREATED);
    }

    // Show details of a particular car
    public function show(CarCategory $carCategory, CarModel $carModel, Car $car)
    {
        return new CarResource($car);
    }

    // Update details of a particular car
    public function update(Request $request, CarCategory $car_category, CarModel $car_model, Car $car)
    {
        $car->update($request->all());
        return response(['data' => new CarResource($car)],Response::HTTP_CREATED);
    }

    // public function destroy(CarCategory $carCategory,CarModel $carModel, Car $car)
    // {
    //     $car->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
