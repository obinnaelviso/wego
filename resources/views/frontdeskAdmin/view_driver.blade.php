@extends('layouts.main')
@section('title', 'Dashboard - View Driver Information')

@section('content')
<div class="row m-t-75">
    <div class="col-md-6">
        <h3 class="title-5 m-b-40 m-l-60 m-t-40">View Driver - {{ $driver->first_name.' '.$driver->last_name }}</h3>
        <div class="table-responsive table--no-card m-l-20">
            <table class="table table-borderless table-data3 table-earning">
                <thead>
                    <tr>
                        <th class="title">User Details</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Full Name</td>
                        <td>{{ $driver->first_name.' '.$driver->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{ $driver->email }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ ucfirst($driver->gender) }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $driver->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Home Address</td>
                        <td>{{ $driver->home_address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-5">
        <div class="table-responsive table--no-card m-r-20 m-l-20 m-t-40">
            <table class="table table-borderless table-data3 table-earning">
                <thead>
                    <tr>
                        <th class="title">Car Details</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Car Name</td>
                        <td>{{ ucfirst($car->name) }}</td>
                    </tr>
                    <tr>
                        <td>Car Model</td>
                        <td>{{ ucfirst($car->car_model->name) }}</td>
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
                        <td>{{ $car->colour }}</td>
                    </tr>
                    <tr>
                        <td>Car Image</td>
                        <td>{{ $car->img_path }}</td>
                    </tr>
                    <tr>
                        <td>Drivers License</td>
                        <td>{{ $driver->drivers_license }}</td>
                    </tr>
                    <tr>
                        <td class="text-right"><em>Action</em></td>
                        <td>@if($driver->account_status == 0) 
                                <form method="POST" action="{{ route('frontdesk_driver_interview', $driver->id) }}">@csrf<button type="submit" class="btn btn-outline-warning"> <i class="fas fa-paper-plane"></i> Send Interview</button></form>
                            @elseif($driver->account_status == 1)
                                <form method="POST" action="{{ route('frontdesk_driver_verified', $driver->id) }}">@csrf<button type="submit" class="btn btn-outline-success"> <i class="fas fa-paper-plane"></i> Send Verified</button></form>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="table-responsive table--no-card m-b-20 m-l-20">
            <table class="table table-borderless table-data3 table-earning">
                <thead>
                    <tr>
                        <th class="title">Account Details</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bank Verification No. (BVN) </td>
                        <td>{{ $driver->bvn }}</td>
                    </tr>
                    <tr>
                        <td>Bank Name </td>
                        <td>{{ ucfirst($driver->bank) }}</td>
                    </tr>
                    <tr>
                        <td>Account Name </td>
                        <td>{{ ucfirst($driver->account_name) }}</td>
                    </tr>
                    <tr>
                        <td>Account Number </td>
                        <td>{{ $driver->account_number }}</td>
                    </tr>
                    <tr>
                        <td>Account Type </td>
                        <td>{{ ucfirst($driver->account_type) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection