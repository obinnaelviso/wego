<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:api');
    }

    // Show all registered customers
    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => CustomerResource::collection(Customer::all())];
    }

    // Register new Customer
    public function add(CustomerRequest $request)
    {
        $customer = new Customer;
        $customer->first_name = $request->firstName;
        $customer->last_name = $request->lastName;
        $customer->email = $request->email_address;
        $customer->password = Hash::make($request->password);
        $customer->gender = $request->sex;
        $customer->phone_number = $request->phone_no;
        $customer->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CustomerResource($customer)],Response::HTTP_OK);
    }

    // Show a customer's details
    public function show(Customer $customer)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => new CustomerResource($customer)];
    }

    // Update customer's information
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->first_name = $request->firstName;
        $customer->last_name = $request->lastName;
        $customer->email = $request->email_address;
        $customer->password = Hash::make($request->password);
        $customer->gender = $request->sex;
        $customer->phone_number = $request->phone_no;
        $customer->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new CustomerResource($customer)],Response::HTTP_OK);;
    }

    /** Update the account status of the customer table \
      * 0 - inactive
      * 1 - active
      * 2 - blocked
      * 3 - change-password
    **/
    public function action(Customer $customer, $action) {
        if($action == "inactive") {
            $customer->account_status = 0;
            $customer->save();
            return "Customer Account Status ".$action;
        } else if($action == "active") {
            $customer->account_status = 1;
            $customer->save();
            return "Customer Account Status ".$action;
        } else if($action == "blocked") {
            $customer->account_status = 2;
            $customer->save();
            return "Customer Account Status ".$action;
        } else if($action == "change-password") {
            $customer->account_status = 3;
            $customer->save();
            return "Customer Account Status ".$action;
        } else {
            return null;
        }
    }
}
