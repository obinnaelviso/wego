<?php

namespace App\Http\Controllers;

use App\Model\Notification;
use App\Model\NotificationType;
use App\Model\Customer;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\Notification\NotificationCollection;
use App\Http\Resources\Notification\NotificationResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')->except('index','show');
    }
    // Show all notifications
    public function index()
    {
        return NotificationCollection::collection(Notification::paginate(7));
    }
    // Show notifications by types
    public function type(NotificationType $notification_type)
    {
        return NotificationCollection::collection($notification_type->notifications);
    }

    public function customer_notifications(Customer $customer, NotificationType $notification_type)
    {
        return NotificationCollection::collection($customer->notifications()->paginate(7));
    }

    public function add(NotificationRequest $request, Customer $customer, Notification $notification_type)
    {
        $notification = new Notification;
        $notification->notification_type_id = $notification_type->id;
        $notification->msg = $request->message;
        // Save
        $customer->notifications()->save($notification);
        return response(['data' => new NotificationResource($notification)],Response::HTTP_CREATED);
    }

   // Display full notification details
    public function show(Customer $customer, Notification $type, Notification $notification)
    {
        return new NotificationResource($notification);
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
