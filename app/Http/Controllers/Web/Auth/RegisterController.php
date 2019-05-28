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
    	$this->middleware(['guest:frontdeskAdmin', 'guest:driver']);
    }

    public function register_frontdesk_admin() {
    	return view('auth.registerFrontdeskAdmin');
    }

    public function register_driver() {
    	return view('auth.registerDriver');
    }

    public function add_driver(DriverRequest $request)
    {
        $driver = new Driver;
        $driver->first_name = $request->firstName;
        $driver->last_name = $request->lastName;
        $driver->email = $request->email_address;
        $driver->password = Hash::make($request->password);
        $driver->gender = $request->sex;
        $driver->phone_number = $request->phone_no;
        $driver->save();

        return "success";
    }

    public function add_frontdeskAdmin(FrontdeskAdminRequest $request)
    {
        $frontdesk = new FrontdeskAdmin;
        $frontdesk->first_name = $request->firstName;
        $frontdesk->last_name = $request->lastName;
        $frontdesk->email = $request->email_address;
        $frontdesk->password = Hash::make($request->password);
        $frontdesk->gender = $request->sex;
        $frontdesk->phone_number = $request->phone_no;
        $frontdesk->save();

        return "success";
    }
}
