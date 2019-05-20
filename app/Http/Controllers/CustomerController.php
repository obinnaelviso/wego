<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;
use App\Http\Resources\Customer\CustomerCollection;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Customer\CustomerResource;

class CustomerController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return CustomerCollection::collection(Customer::paginate(7));
    }

    // Register new Customer
    public function add(CustomerRequest $request)
    {
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->gender = $request->gender;
        $customer->phone_number = $request->phone_number;
        $customer->save();
        return response(['data' => new CustomerResource($customer)],Response::HTTP_CREATED);
    }

    // show a particular customer full details
    public function show(Customer $customer)
    {
        return $customer;
    }

    // Update customer's information
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return response(['data' => new CustomerResource($customer)],Response::HTTP_CREATED);
    }

    // public function destroy(Customer $customer)
    // {
    //     $customer->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
