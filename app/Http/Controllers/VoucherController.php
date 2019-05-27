<?php

namespace App\Http\Controllers;
use App\Http\Resources\VoucherResource;
use App\Http\Requests\VoucherRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => VoucherResource::collection(Voucher::all())];
    }

    public function add(VoucherRequest $request)
    {
        $voucher = new Voucher;
        $voucher->voucher_id = "GOGO".strtoupper(sha1(time()));
        $voucher->value = $request->money_value;
        $voucher->stock = $request->remaining;
        $voucher->start_date = $request->validity_date;
        $voucher->end_date = $request->expiry_date;
        // Save
        $voucher->save();
        return response(['message' => 202, 
                        'error' => [], 
                        'data' => new VoucherResource($voucher)],Response::HTTP_OK);
    }

    public function update(VoucherRequest $request, Voucher $voucher)
    {
        $voucher->value = $request->money_value;
        $voucher->stock = $request->remaining;
        $voucher->start_date = $request->validity_date;
        $voucher->end_date = $request->expiry_date;
        $voucher->save();
        return response(['message' => 206, 
                        'error' => [], 
                        'data' => new VoucherResource($voucher)],Response::HTTP_OK);
    }

    public function action(Voucher $voucher, $action)
    {
        if($action == "invalid") {
            $voucher->status = $action;
            $voucher->save();
            return ["voucher-status" => $action];
        } else if($action == "active") {
            $voucher->status = $action;
            $voucher->save();
            return ["voucher-status" => $action];
        } else if($action == "expired") {
            $voucher->status = $action;
            $voucher->save();
            return ["voucher-status" => $action];
        } else if($action == "out-of-stock") {
            $voucher->status = $action;
            $voucher->save();
            return ["voucher-status" => $action];
        } else {
            return null;
        }
    }

}
