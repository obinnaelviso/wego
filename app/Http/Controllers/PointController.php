<?php

namespace App\Http\Controllers;
use App\Http\Resources\PointResource;
use App\Http\Requests\PointRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => PointResource::collection(Point::all())];
    }

    public function add(PointRequest $request)
    {
        $point = new Point;
        $point->value = $request->rate;
        $point->version = $request->version;
        // Save
        $point->save();
        return response(['message' => 202, 
                        'error' => [], 
                        'data' => new PointResource($point)],Response::HTTP_OK);
    }
}
