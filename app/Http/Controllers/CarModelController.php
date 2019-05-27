<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarModelRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\CarModel;
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
    public function index(CarCategory $car_category)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => CarModelResource::collection($car_category->car_models)];
    }

    // Add a car model to the database
    public function add(CarModelRequest $request, CarCategory $carCategory)
    {
        $car_model = new CarModel;
        $car_model->name = $request->model_name;
        $carCategory->car_models()->save($car_model);
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CarModelResource($car_model)],Response::HTTP_OK);
    }

    // Update car model information
    public function update(CarModelRequest $request, CarCategory $carCategory, CarModel $carModel)
    {
        $carModel->name = $request->model_name;
        $carModel->car_category_id = $carCategory->id;
        $carModel->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CarModelResource($carModel)],Response::HTTP_OK);
    }
}
