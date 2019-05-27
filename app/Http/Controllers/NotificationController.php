<?php

namespace App\Http\Controllers;

use App\Model\Notification;
use App\Model\NotificationType;
use App\Model\Customer;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    // Show all notifications
    public function all()
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => NotificationResource::collection(Notification::all())];
    }
    // Show notifications by types
    public function type(NotificationType $notification_type)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => NotificationResource::collection($notification_type->notifications)];
    }

    public function index(Customer $customer, NotificationType $notification_type)
    {
        return ['message' => 200, 
                'error' => [], 
                'data' => NotificationResource::collection($customer->notifications)];
    }

    public function add(NotificationRequest $request, Customer $customer, Notification $notification_type)
    {
        $notification = new Notification;
        $notification->notification_type_id = $notification_type->id;
        $notification->msg = $request->message;
        // Save
        $customer->notifications()->save($notification);
        return response(['message' => 202, 
                        'error' => [], 
                        'data' => new NotificationResource($notification)],Response::HTTP_OK);
    }

    // update notifications
    public function action(Notification $notification, $action)
    {
        if($action == "read") {
            $notification->status = $action;
            $notification->save();
            return "Notification ".$action;
        } else if($action == "viewed") {
            $notification->status = $action;
            $notification->save();
            return "Notification ".$action;
        } else if($action == "removed") {
            $notification->status = $action;
            $notification->save();
            return "Notification ".$action;
        } else return "null";
    }
}
