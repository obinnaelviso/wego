<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Car;
use App\Model\CarCategory;
use App\Model\CarModel;
use App\Http\Resources\CarResource;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function all() {
        return ['message' => 200, 
                'error' => [], 
                'data' => CarResource::collection(Car::all())];
    }

    public function index(CarCategory $carCategory, CarModel $carModel)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => CarResource::collection($carModel->cars)];
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
        $car->img_path = $request->car_img;
        $car_model->cars()->save($car);
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CarResource($car)],Response::HTTP_OK);
    }

    // Show details of a particular car
    public function show(CarCategory $carCategory, CarModel $carModel, Car $car)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => new CarResource($car)];
    }

    // Update details of a particular car
    public function update(CarRequest $request, CarCategory $car_category, CarModel $car_model, Car $car)
    {
        $car->name = $request->car_name;
        $car->booking_percent = $request->percentage;
        $car->plate_number = $request->plate_no;
        $car->stock = $request->in_stock;
        $car->price = $request->cost;
        $car->colour = $request->color;
        $car->year = $request->car_year;
        $car->img_path = $request->car_img;
        $car->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CarResource($car)],Response::HTTP_OK);
    }

    public function action(CarRequest $request, CarCategory $car_category, CarModel $car_model, Car $car, $action)
    {
        return null;
    }
}
