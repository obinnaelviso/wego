<?php

namespace App\Http\Controllers;

use App\Model\FrontdeskAdmin;
use App\Http\Requests\FrontdeskAdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\FrontdeskAdminResource;

class FrontdeskAdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => FrontdeskAdminResource::collection(FrontdeskAdmin::all())];
    }

    public function add(FrontdeskAdminRequest $request)
    {
        $frontdesk = new FrontdeskAdmin;
        $frontdesk->first_name = $request->firstName;
        $frontdesk->last_name = $request->lastName;
        $frontdesk->email = $request->email_address;
        $frontdesk->password = Hash::make($request->password);
        $frontdesk->gender = $request->sex;
        $frontdesk->phone_number = $request->phone_no;
        $frontdesk->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new FrontdeskAdminResource($frontdesk)],Response::HTTP_OK);
    }

    public function show(FrontdeskAdmin $frontdesk_admin)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => new FrontdeskAdminResource($frontdesk_admin)];
    }

    public function update(FrontdeskAdminRequest $request, FrontdeskAdmin $frontdesk_admin)
    {
        $frontdesk_admin->first_name = $request->firstName;
        $frontdesk_admin->last_name = $request->lastName;
        $frontdesk_admin->email = $request->email_address;
        $frontdesk_admin->password = Hash::make($request->password);
        $frontdesk_admin->gender = $request->sex;
        $frontdesk_admin->phone_number = $request->phone_no;
        $frontdesk_admin->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new FrontdeskAdminResource($frontdesk_admin)],Response::HTTP_OK);;
    }

    public function action(FrontdeskAdmin $frontdesk_admin, $action) {
        if($action == "inactive") {
            $frontdesk_admin->account_status = 0;
            $frontdesk_admin->save();
            return "Frontdesk Admin Account Status ".$action;
        } else if($action == "active") {
            $frontdesk_admin->account_status = 1;
            $frontdesk_admin->save();
            return "Frontdesk Admin Account Status ".$action;
        } else if($action == "blocked") {
            $frontdesk_admin->account_status = 2;
            $frontdesk_admin->save();
            return "Frontdesk Admin Account Status ".$action;
        } else if($action == "change-password") {
            $frontdesk_admin->account_status = 3;
            $frontdesk_admin->save();
            return "Frontdesk Admin Account Status ".$action;
        } else {
            return null;
        }
    }
}
