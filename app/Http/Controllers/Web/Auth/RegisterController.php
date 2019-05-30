<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\FrontdeskAdmin;
use App\Model\Driver;

class RegisterController extends Controller
{
    public function __construct() {
    	$this->middleware('guest:frontdeskAdmin');
    }

    public function register_frontdesk_admin() {
    	return view('auth.registerFrontdeskAdmin');
    }

    public function register_driver() {
    	return view('auth.registerDriver');
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
            'phone_no' => 'required'
    	]);

        $driver = new Driver;
        $driver->first_name = $request->firstName;
        $driver->last_name = $request->lastName;
        $driver->email = $request->email_address;
        $driver->password = $request->password;
        $driver->gender = $request->sex;
        $driver->phone_number = $request->phone_no;
        $driver->save();

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
