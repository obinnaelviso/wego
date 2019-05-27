<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationTypeRequest;
use App\Http\Resources\NotificationTypeResource;
use Symfony\Component\HttpFoundation\Response;
use App\Model\NotificationType;
use Illuminate\Http\Request;

class NotificationTypeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => NotificationTypeResource::collection(NotificationType::all())];
    }

    public function add(NotificationTypeRequest $request)
    {
        $notif_type = new NotificationType;
        $notif_type->name = $request->type;
        //save
        $notif_type->save();
        return response(['message' => 202, 
                        'error' => [], 
                        'data' => new NotificationTypeResource($notif_type)],Response::HTTP_OK);
    }

    public function update(NotificationTypeRequest $request, NotificationType $notif_type)
    {
        $notif_type->name = $request->type;
        $notif_type->save();
        return response(['message' => 206, 
                        'error' => [], 
                        'data' => new NotificationTypeResource($notif_type)],Response::HTTP_OK);
    }
}
