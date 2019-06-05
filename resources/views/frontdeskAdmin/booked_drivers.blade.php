@extends('layouts.main')
@section('title', 'Dashboard - Booked Drivers')
@section('drivers', 'active')
@section('booked_drivers', 'active')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	    	<div class="user-data m-b-30">
		        <!-- DATA TABLE -->
		        <h3 class="title-5 m-b-40 m-l-40 m-t-40">booked drivers</h3>
		        <div class="table-responsive table-data">
		            <table class="table table-data2">
		            	@if(session()->has('alert'))
		                        <div class="alert alert-success">
		                            {{ session()->get('alert') }}
		                        </div>
		                     @endif
		                <thead>
		                    <tr>
		                        <th>name</th>
		                        <th>email</th>
		                        <th>phone number</th>
		                        <th>customer name</th>
		                        <th>booking date</th>
		                        <th>status</th>
		                        <th>action</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($drivers as $driver)
			                    <tr class="tr-shadow">
			                        <td>{{ $driver->first_name.' '.$driver->last_name }}</td>
			                        <td>
			                            <span class="block-email">{{ $driver->email }}</span>
			                        </td>
			                        <td>{{ $driver->phone_number }}</td>
			                        <td>{{ $driver->booking->customer->first_name.' '.$driver->booking->customer->last_name }}</td>
			                        <td>{{ $driver->booking->time }}</td>
			                        <td><i class="text-primary">Booked</i></td>
			                        <td>
			                        	<div class="btn-group"><a href="{{ route('frontdesk_view_driver', $driver->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a><a href="{{ route('frontdesk_view_booking', $driver->booking->id) }}" class="btn btn-success btn-sm"><b>!</b> Goto Booking</a>
			                        	</div>
			                        </td>
			                    </tr>
			                    <tr class="spacer"></tr>
		                    @endforeach
		                </tbody>
		            </table>
		            <div class="row">
		            	<div class="col-md-6">{{ $drivers->links() }}</div>
		            </div>
		        </div>
		        <!-- END DATA TABLE -->
		    </div>
	    </div>
	</div>
@endsection
