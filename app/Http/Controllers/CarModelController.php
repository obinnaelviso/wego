<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Model\CarModel;
use App\Model\CarMake;
use App\Model\CarCategory;
use App\Http\Resources\CarModelResource;
use Illuminate\Http\Request;

class CarModelController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    // Shows the all car models
    public function all()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => CarModelResource::collection(CarModel::all())];
    }

    // Shows the all car models by their category
    public function index(CarMake $car_make)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => CarModelResource::collection($car_make->car_models)];
    }

    // Add a car model to the database
    public function add(Request $request, CarMake $car_make)
    {
        $car_model = new CarModel;
        $car_model->name = $request->car_model;
        $car_model->booking_percent = $request->percentage;
        $car_model->plate_number = $request->plate_no;
        $car_model->price = $request->cost;
        $car_model->colour = $request->color;
        $car_model->year = $request->car_year;
        $car_model->img_path = $request->car_img;
        $car_model->driver_id = $request->driver_id;
        $car_make->car_models()->save($car_model);
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CarModelResource($car_model)],Response::HTTP_OK);
    }

    // Show details of a particular car model
    public function show(CarMake $car_make, CarModel $car_model)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => new CarModelResource($car_model)];
    }

    // Update car model information
    public function update(Request $request, CarMake $car_make, CarModel $car_model)
    {
        $car_model->name = $request->car_model;
        $car_model->booking_percent = $request->percentage;
        $car_model->plate_number = $request->plate_no;
        $car_model->price = $request->cost;
        $car_model->colour = $request->color;
        $car_model->year = $request->car_year;
        $car_model->img_path = $request->car_img;
        $car_model->driver_id = $request->driver_id;
        $car_model->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CarModelResource($car_model)],Response::HTTP_OK);
    }

    public function action(CarRequest $request, CarMake $car_make, CarModel $car_model, $action)
    {
        return null;
    }
}
