@extends('layouts.main')
@section('title', 'Dashboard - View Car Information')
@section('cars', 'active')

@section('content')
<div class="row m-t-75">
    <div class="col-md-12">
        <h3 class="title-5 m-b-40 m-l-60 m-t-40">View Car</h3>
        <div class="table-responsive table--no-card m-l-20">
            <table class="table table-borderless table-data3 table-earning">
                <thead>
                    <tr>
                        <th class="title">Car Details</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Car Model</td>
                        <td>{{ ucfirst($car->car_model->name) }}</td>
                    </tr>
                    <tr>
                        <td>Car Make</td>
                        <td>{{ ucfirst($car->car_model->car_make->name) }}</td>
                    </tr>
                    <tr>
                        <td>Plate Number</td>
                        <td>{{ strtoupper($car->plate_number) }}</td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>{{ $car->year }}</td>
                    </tr>
                    <tr>
                        <td>Colour</td>
                        <td>{{ ucfirst($car->colour) }}</td>
                    </tr>
                    <tr>
                        <td>Picture</td>
                        <td>{{ ucfirst($car->default_img) }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @switch($car->status)
                                @case(0)
                                    <i class="text-warning">Unverified</i>
                                    @break

                                @case(1)
                                    <i class="text-success">Verified</i>
                                    @break

                                @case(-1)
                                    <i class="text-danger">Banned</i>
                                    @break

                                @case(-2)
                                    <i class="text-danger">Rejected</i>
                                    @break
                                @default
                                    Unknown
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                            @switch($car->status)
                                @case(0)
                                    <td><em>Action</em></td>
                                    <td>
                                        <div class="btn-group">
                                            <form method="POST" action="{{ route('frontdesk_reject_car', [$car->id, -2]) }}">@csrf<button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-ban"></i> Reject</button></form>
                                            <form method="POST" action="{{ route('frontdesk_verify_car', $car->id) }}">@csrf<button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Verify</button></form>
                                        </div>
                                    @break
                                @case(1)
                                    <td><em>Action</em></td>
                                    <td>
                                    <form method="POST" action="{{ route('frontdesk_reject_car', [$car->id, -1]) }}">@csrf<button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-ban"></i> Ban</button></form></td>
                                    @break
                                @case(-1)
                                    <td><em>Action</em></td>
                                    <td>
                                    <form method="POST" action="{{ route('frontdesk_unban_car', $car->id) }}">@csrf<button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Unban</button></form></td>
                                    @break
                            @endswitch
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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
                        <td>{{ ucfirst($car->driver->first_name.' '.$car->driver->last_name) }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{ ucfirst($car->driver->email) }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ ucfirst($car->driver->phone_number) }}</td>
                    </tr>
                    <tr>
                        <td>Account Status</td>
                        <td>
                            @switch($car->driver->account_status)
                                @case(0)
                                    <i>Unverified</i>
                                    @break

                                @case(1)
                                    <i class="text-success">Interviewed</i>
                                    @break

                                @case(2)
                                    <i class="text-danger">Verified</i>
                                    @break

                                @case(-1)
                                    <i class="text-danger">Banned</i>
                                    @break

                                @case(-2)
                                    <i class="text-danger">Rejected</i>
                                    @break
                                @default
                                    Unknown
                            @endswitch
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection