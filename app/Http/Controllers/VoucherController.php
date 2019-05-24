<?php

namespace App\Http\Controllers;
use App\Http\Resources\Voucher\VoucherResource;
use App\Http\Requests\VoucherRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return VoucherResource::collection(Voucher::paginate(7));
    }

    public function add(VoucherRequest $request)
    {
        $voucher = new Voucher;
        $voucher->voucher_id = "GOGO".strtoupper(sha1(time()));
        $voucher->value = $request->money_value;
        $voucher->count = $request->used;
        $voucher->stock = $request->remaining;
        $voucher->start_date = $request->validity_date;
        $voucher->end_date = $request->expiry_date;
        // Save
        $voucher->save();
        return response(['data' => new VoucherResource($voucher)],Response::HTTP_CREATED);
    }

    public function update(VoucherRequest $request, Voucher $voucher)
    {
        $voucher->voucher_id = "GOGO".strtoupper(sha1(time()));
        $voucher->value = $request->money_value;
        $voucher->count = $request->used;
        $voucher->stock = $request->remaining;
        $voucher->start_date = $request->validity_date;
        $voucher->end_date = $request->expiry_date;
        $voucher->save();
        return response(['data' => new VoucherResource($voucher)],Response::HTTP_CREATED);
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
