<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationTypeRequest;
use App\Http\Resources\NotificationType\NotificationTypeResource;
use Symfony\Component\HttpFoundation\Response;
use App\Model\NotificationType;
use Illuminate\Http\Request;

class NotificationTypeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return NotificationTypeResource::collection(NotificationType::all());
    }

    public function add(NotificationTypeRequest $request)
    {
        $notif_type = new NotificationType;
        $notif_type->name = $request->type;
        //save
        $notif_type->save();
        return response(['data'=> new NotificationTypeResource($notif_type)], Response::HTTP_CREATED);
    }

    public function update(Request $request, NotificationType $notificationType)
    {
        //
    }
}
