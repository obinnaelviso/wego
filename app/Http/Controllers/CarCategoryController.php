<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Model\CarCategory;
use App\Http\Requests\CarCategoryRequest;
use App\Http\Resources\CarCategory\CarCategoryCollection;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return CarCategoryCollection::collection(CarCategory::paginate(7));
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
    public function store(CarCategoryRequest $request)
    {
        $car_category = new CarCategory;
        $car_category->name = $request->name;
        $car_category->save();
        return response(['data' => new CarCategoryCollection($car_category)],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CarCategory $carCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CarCategory $carCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function update(CarCategoryRequest $request, CarCategory $carCategory)
    {
        $carCategory->update($request->all());
        return response(['data' => new CarCategoryCollection($carCategory)],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CarCategory  $carCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarCategory $carCategory)
    {
        $carCategory->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
