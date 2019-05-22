<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarModelRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\CarModel;
use App\Model\CarCategory;
use App\Http\Resources\CarModel\CarModelResource;
use Illuminate\Http\Request;

class CarModelController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    // Shows the list of car models
    public function index(CarCategory $car_category)
    {
        return CarModelResource::collection($car_category->car_models);
    }

    // Add a car model to the database
    public function add(CarModelRequest $request, CarCategory $carCategory)
    {
        $car_model = new CarModel;
        $car_model->name = $request->model_name;
        $carCategory->car_models()->save($car_model);
        return response(['data' => new CarModelResource($car_model)],Response::HTTP_CREATED);
    }

    // // show a particular car model
    // public function show(CarModel $carModel)
    // {
    //     //
    // }

    // Update car model information
    public function update(CarModelRequest $request, CarCategory $carCategory, CarModel $carModel)
    {
        $carModel->update($request->all());
        return response(['data' => new CarModelResource($carModel)],Response::HTTP_CREATED);
    }

    // remove a particular car model
    // public function destroy(CarCategory $carCategory,CarModel $carModel)
    // {
    //     $carModel->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
