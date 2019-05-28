<?php

namespace App\Http\Controllers;

use App\Model\DriverLocation;
use App\Model\Driver;
use App\Model\Location;
use App\Http\Requests\DriverLocationRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\DriverLocationResource;

class DriverLocationController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => DriverLocationResource::collection(DriverLocation::all())];
    }

    public function drivers(Driver $driver)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => DriverLocationResource::collection($driver->driver_locations)];
    }

    public function locations(Location $location)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => DriverLocationResource::collection($location->driver_locations)];
    }

    public function add(Driver $driver, Location $location)
    {
        $driver_location = new DriverLocation;
        $driver_location->driver_id = $driver->id;
        $driver_location->location_id = $location->id;
        $driver_location->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new DriverLocationResource($driver_location)],Response::HTTP_OK);
    }
}
