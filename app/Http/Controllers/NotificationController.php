<?php

namespace App\Http\Controllers;

use App\Model\Notification;
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
    
    public function index()
    {
        return NotificationCollection::collection(Notification::paginate(7));
    }

    public function customer_notifications(Customer $customer)
    {
        return NotificationCollection::collection($customer->notifications()->paginate(5));
    }

    public function add(NotificationRequest $request, Customer $customer)
    {
        $notification = new Notification;
        $notification->status = 'soft';
        $notification->description = $request->message;
        $notification->type = $request->type;
        // Save
        $customer->notifications()->save($notification);
        return response(['data' => new NotificationResource($notification)],Response::HTTP_CREATED);
    }

   // Display full notification details
    public function show(Customer $customer, Notification $notification)
    {
        return new NotificationResource($notification);
    }


    // update notifications
    public function update(Request $request, Notification $notification)
    {
        //
    }
}
