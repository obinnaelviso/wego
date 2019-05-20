<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Model\CarCategory;
use App\Http\Requests\CarCategoryRequest;
use App\Http\Resources\CarCategory\CarCategoryCollection;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    // shows car categories
    public function index()
    {
        return CarCategoryCollection::collection(CarCategory::paginate(7));
    }

    // Add a new car category
    public function add(CarCategoryRequest $request)
    {
        $car_category = new CarCategory;
        $car_category->name = $request->name;
        $car_category->save();
        return response(['data' => new CarCategoryCollection($car_category)],Response::HTTP_CREATED);
    }

    // Update car category details
    public function update(CarCategoryRequest $request, CarCategory $carCategory)
    {
        $carCategory->update($request->all());
        return response(['data' => new CarCategoryCollection($carCategory)],Response::HTTP_CREATED);
    }

    // public function destroy(CarCategory $carCategory)
    // {
    //     $carCategory->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
