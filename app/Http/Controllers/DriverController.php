<?php

namespace App\Http\Controllers;

use App\Model\Driver;
use App\Http\Requests\DriverRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\DriverResource;

class DriverController extends Controller
{
   public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => DriverResource::collection(Driver::all())];
    }

    public function add(DriverRequest $request)
    {
        $driver = new Driver;
        $driver->first_name = $request->firstName;
        $driver->last_name = $request->lastName;
        $driver->email = $request->email_address;
        $driver->password = Hash::make($request->password);
        $driver->gender = $request->sex;
        $driver->phone_number = $request->phone_no;
        $driver->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new DriverResource($driver)],Response::HTTP_OK);
    }

    public function show(Driver $driver)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => new DriverResource($driver)];
    }

    public function update(DriverRequest $request, Driver $driver)
    {
        $driver->first_name = $request->firstName;
        $driver->last_name = $request->lastName;
        $driver->email = $request->email_address;
        $driver->password = Hash::make($request->password);
        $driver->gender = $request->sex;
        $driver->phone_number = $request->phone_no;
        $driver->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new DriverResource($driver)],Response::HTTP_OK);;
    }

    public function action(Driver $driver, $action) {
        if($action == "inactive") {
            $driver->account_status = 0;
            $driver->save();
            return "Driverdriver Admin Account Status ".$action;
        } else if($action == "active") {
            $driver->account_status = 1;
            $driver->save();
            return "Driver Account Status ".$action;
        } else if($action == "blocked") {
            $driver->account_status = 2;
            $driver->save();
            return "Driver Account Status ".$action;
        } else if($action == "change-password") {
            $driver->account_status = 3;
            $driver->save();
            return "Driver Account Status ".$action;
        } else {
            return null;
        }
    }
}
