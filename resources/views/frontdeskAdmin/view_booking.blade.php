@extends('layouts.main')
@section('title', 'Dashboard - View Booking Information')
@section('bookings', 'active')

@section('content')
<div class="row m-t-75">
    <div class="col-md-12">
        <h3 class="title-5 m-b-40 m-l-60 m-t-40">View Booking</h3>
        <div class="table-responsive table--no-card m-l-20">
            <table class="table table-borderless table-data3 table-earning">
                <thead>
                    <tr>
                        <th class="title">Booking Details</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Customer Name</td>
                        <td>{{ $booking->customer->first_name.' '.$booking->customer->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{ $booking->customer->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $booking->customer->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Booking Schedule</td>
                        <td>{{ $booking->time }}</td>
                    </tr>
                    <tr>
                        <td>Booking Type</td>
                        <td>{{ $booking->booking_time->name }}</td>
                    </tr>
                    <tr>
                        <td>No. of Hours</td>
                        <td>{{ $booking->booking_time->duration }}</td>
                    </tr>
                    <tr>
                        <td>Pickup Location</td>
                        <td>{{ $booking->location }}</td>
                    </tr>
                    <tr>
                        <td>Booking Cost</td>
                        <td>{{ $booking->cost}}</td>
                    </tr>
                    <tr>
                        <td>Points</td>
                        <td>{{ $booking->pts}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @switch($booking->status)
                                @case(0)
                                    <i class="text-warning">Pending</i>
                                    @break

                                @case(1)
                                    <i class="text-success">Payment Confirmed</i>
                                    @break

                                @case(2)
                                    <i class="text-primary">Driver Assigned</i>
                                    @break

                                @case(3)
                                    <i class="text-success">Active</i>
                                    @break

                                @case(4)
                                    <i class="text-primary">Completed</i>
                                    @break

                                @case(5)
                                    <i class="text-danger">Reviewed</i>
                                    @break

                                @case(6)
                                    <i class="text-warning">Cancelled</i>
                                    @break

                                @default
                                    Unknown
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                            @switch($booking->status)
                                @case(0)
                                    <td><em>Action</em></td>
                                    <td>
                                    <form method="POST" action="{{ route('frontdesk_confirm_payment', $booking->id) }}">@csrf<button type="submit" class="btn btn-sm btn-outline-primary">Confirm Payment</button></form></td>
                                    @break
                                @case(1)
                                    <td><em>Action</em></td>
                                    <td>
                                    <form method="POST" action="{{ route('frontdesk_drivers_cars', $booking->id) }}">@csrf<button type="submit" class="btn btn-sm btn-outline-primary">Assign a Driver</button></form></td>
                                    @break
                                @case(2)
                                    <td><em>Action</em></td>
                                    <td>
                                    <form method="POST" action="{{ route('frontdesk_cancel_booking', $booking->id) }}">@csrf<button type="submit" class="btn btn-sm btn-outline-warning">Cancel Booking</button></form></td>
                                    @break
                                @case(3)
                                    <td><em>Action</em></td>
                                    <td>
                                    <form method="POST" action="{{ route('frontdesk_cancel_booking', $booking->id) }}">@csrf<button type="submit" class="btn btn-sm btn-outline-warning">Cancel Booking</button></form></td>
                                    @break
                            @endswitch
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if($booking->driver_id)
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-l-20 m-t-40">
                <table class="table table-borderless table-data3 table-earning">
                    <thead>
                        <tr>
                            <th class="title">Driver Details</th><th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Driver Name</td>
                            <td>{{ ucfirst($booking->driver->first_name.' '.$booking->driver->last_name) }}</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>{{ ucfirst($booking->driver->email) }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ ucfirst($booking->driver->phone_number) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

<div class="row m-t-45">
    <div class="col-md-12">
        <div class="table-responsive table--no-card m-b-20 m-l-20">
            <table class="table table-borderless table-data3 table-earning">
                <thead>
                    <tr>
                        <th class="title">Car Details</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Car Model </td>
                        <td>{{ ucfirst($booking->car_model->name) }}</td>
                    </tr>
                    <tr>
                        <td>Car Make </td>
                        <td>{{ ucfirst($booking->car_model->car_make->name) }}</td>
                    </tr>
                    <tr>
                        <td>Car Year </td>
                        <td>{{ ucfirst($booking->car_model->year) }}</td>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection