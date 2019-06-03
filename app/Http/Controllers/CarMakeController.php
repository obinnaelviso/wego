<?php

namespace App\Http\Controllers;

use App\Model\CarMake;
use Symfony\Component\HttpFoundation\Response;
use App\Model\CarCategory;
use App\Http\Resources\CarMakeResource;
use Illuminate\Http\Request;

class CarMakeController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    public function all()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => CarMakeResource::collection(CarMake::all())];
    }

    // Shows the all car makes by their category
    public function index(CarCategory $car_category)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => CarMakeResource::collection($car_category->car_makes)];
    }

    // Add a car make to the database
    public function add(Request $request, CarCategory $carCategory)
    {
        $car_make = new CarMake;
        $car_make->name = $request->make_name;
        $carCategory->car_makes()->save($car_make);
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CarMakeResource($car_make)],Response::HTTP_OK);
    }

    // Update car make information
    public function update(Request $request, CarCategory $car_category, CarMake $car_make)
    {
        $car_make->name = $request->make_name;
        $car_make->car_category_id = $car_category->id;
        $car_make->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CarMakeResource($car_make)],Response::HTTP_OK);
    }
}
