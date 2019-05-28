<?php

namespace App\Http\Controllers;

use App\Model\IssuedVoucher;
use App\Model\Voucher;
use App\Model\Customer;
use App\Http\Requests\IssuedVoucherRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\IssuedVoucherResource;

class IssuedVoucherController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => IssuedVoucherResource::collection(IssuedVoucher::all())];
    }

    public function customers(Customer $customer)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => IssuedVoucherResource::collection($customer->issued_vouchers)];
    }

    public function vouchers(Voucher $voucher)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => IssuedVoucherResource::collection($voucher->issued_vouchers)];
    }

    public function add(Customer $customer, Voucher $voucher)
    {
        $issued_voucher = new IssuedVoucher;
        $issued_voucher->customer_id = $customer->id;
        $issued_voucher->voucher_id = $voucher->id;
        $issued_voucher->save();
        return response(['message' => 200, 
                        'error' => [], 
                        'data' => new IssuedVoucherResource($issued_voucher)],Response::HTTP_OK);
    }
}
