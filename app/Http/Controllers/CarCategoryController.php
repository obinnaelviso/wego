<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Model\CarCategory;
use App\Http\Requests\CarCategoryRequest;
use App\Http\Resources\CarCategoryResource;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    // shows car categories
    public function index()
    {
       return ['message' => 200, 
                'error' => [], 
                'data' => CarCategoryResource::collection(CarCategory::all())];
    }

    // Add a new car category
    public function add(CarCategoryRequest $request)
    {
        $car_category = new CarCategory;
        $car_category->name = $request->category_name;
        $car_category->save();
        return response(['message' => 202, 
                        'error' => [], 
                        'data' => new CarCategoryResource($car_category)],Response::HTTP_OK);
    }

    // Update car category details
    public function update(CarCategoryRequest $request, CarCategory $carCategory)
    {
        $carCategory->name = $request->category_name;
        $carCategory->save();
        return response(['message' => 206, 
                        'error' => [], 
                        'data' => new CarCategoryResource($carCategory)],Response::HTTP_OK);
    }

    // public function destroy(CarCategory $carCategory)
    // {
    //     $carCategory->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
