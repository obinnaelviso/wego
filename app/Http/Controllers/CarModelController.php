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

    public function index(CarCategory $car_category)
    {
        return CarModelResource::collection($car_category->car_models);
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
    public function store(CarModelRequest $request, CarCategory $carCategory)
    {
        $car_model = new CarModel($request->all());
        $carCategory->car_models()->save($car_model);
        return response(['data' => new CarModelResource($car_model)],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CarModel $carModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function update(CarModelRequest $request, CarCategory $carCategory, CarModel $carModel)
    {
        $carModel->update($request->all());
        return response(['data' => new CarModelResource($carModel)],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarCategory $carCategory,CarModel $carModel)
    {
        $carModel->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
