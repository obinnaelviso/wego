<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\FrontdeskAdmin;
use App\Model\Driver;
use App\Model\CarModel;
use App\Model\Car;

class RegisterController extends Controller
{
    public function __construct() {
    	$this->middleware('guest:frontdeskAdmin');
    }

    public function register_frontdesk_admin() {
    	return view('auth.registerFrontdeskAdmin');
    }

    public function register_driver() {
        $car_models = CarModel::all();
    	return view('auth.registerDriver', compact('car_models'));
    }

    public function add_driver(Request $request)
    {
    	$this->validate(request(), [
    		'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            'email_address' => 'required|
                                unique:frontdesk_admins,email|
                                unique:drivers,email|
                                unique:customers,email|email',
            'sex' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'bank_verification_no' => 'required',
            'drivers_license_img' => 'required',
            'acc_name' => 'required',
            'acc_number' => 'required',
            'acc_type' => 'required',
            'bank_name' => 'required',

            'car_name' => 'required|max:255|unique:cars,name',
            'color' => 'required|string',
            'plate_no' => 'required|string|unique:cars,plate_number',
            'color' => 'required|string',
            'car_year' => 'required|integer',
            'car_img' => 'required|string',
            'car_model' => 'required'
    	]);
        // Driver
        $driver = new Driver;
        $driver->first_name = $request->firstName;
        $driver->last_name = $request->lastName;
        $driver->email = $request->email_address;
        $driver->password = $request->password;
        $driver->gender = $request->sex;
        $driver->phone_number = $request->phone_no;
        $driver->home_address = $request->address;
        $driver->bvn = $request->bank_verification_no;
        $driver->drivers_license = $request->drivers_license_img;
        $driver->account_name = $request->acc_name;
        $driver->account_number = $request->acc_number;
        $driver->account_type = $request->acc_type;
        $driver->bank = $request->bank_name;
        // Car
        $car = new Car;
        $car->car_model_id = $request->car_model;
        $car->name = $request->car_name;
        $car->plate_number = $request->plate_no;
        $car->colour = $request->color;
        $car->year = $request->car_year;
        $car->img_path = $request->car_img;
        $car->car_model_id = $request->car_model;

        $driver->save();
        $car->driver_id = $driver->id;
        $car->save();
        return "success";
    }

    public function add_frontdeskAdmin(Request $request)
    {
    	$this->validate(request(), [
    		'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            'email_address' => 'required|
                                unique:frontdesk_admins,email|
                                unique:drivers,email|
                                unique:customers,email|email',
            'sex' => 'required',
            'phone_no' => 'required'
    	]);

    	// Register
        $frontdesk = new FrontdeskAdmin;
        $frontdesk->first_name = $request->firstName;
        $frontdesk->last_name = $request->lastName;
        $frontdesk->email = $request->email_address;
        $frontdesk->password = $request->password;
        $frontdesk->gender = $request->sex;
        $frontdesk->phone_number = $request->phone_no;
        $frontdesk->save();

        return "success";
    }
}
