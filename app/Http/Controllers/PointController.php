<?php

namespace App\Http\Controllers;
use App\Http\Resources\Point\PointResource;
use App\Http\Requests\PointRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return PointResource::collection(Point::paginate(7));
    }

    public function add(PointRequest $request)
    {
        $point = new Point;
        $point->value = $request->rate;
        $point->version = $request->version;
        // Save
        $point->save();
        return response(['data' => new PointResource($point)], Response::HTTP_CREATED);
    }

    public function update(Request $request, Point $point)
    {
        //
    }

    public function destroy(Point $point)
    {
        //
    }
}
