<?php

namespace App\Http\Controllers;

use App\Model\Location;
use Illuminate\Http\Request;
use App\Http\Requests\LocationRequest;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\LocationResource;

class LocationController extends Controller
{
   public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => LocationResource::collection(Location::all())];
    }

    // Add new Location
    public function add(LocationRequest $request)
    {
        $location = new Location;
        $location->name = $request->location_name;
        $location->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new LocationResource($location)],Response::HTTP_OK);
    }

    // Update location information
    public function update(LocationRequest $request, Location $location)
    {
        $location->name = $request->location_name;
        $location->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new LocationResource($location)],Response::HTTP_OK);;
    }
}
