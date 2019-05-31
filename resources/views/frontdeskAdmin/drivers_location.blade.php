@extends('layouts.main')
@section('title', 'Dashboard - Drivers Location')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">drivers location</h3>
	        <div class="table-responsive table-responsive-data2">
	            <table class="table table-data2">
	                <thead>
	                    <tr>
	                        <th>name</th>
	                        <th>email</th>
	                        <th>phone number</th>
	                        <th>location</th>
	                        <th>action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($driver_locations as $driver_location)
		                    <tr class="tr-shadow">
		                        <td>{{ $driver_location->driver->first_name.' '.$driver_location->driver->last_name }}</td>
		                        <td>
		                            <span class="block-email">{{ $driver_location->driver->email }}</span>
		                        </td>
		                        <td class="desc">{{ $driver_location->driver->phone_number }}</td>
		                        <td>{{ $driver_location->location->name }}</td>
		                        <td><form method="POST" action="{{ route('frontdesk_send_driver', [$booking->id,$driver_location->driver->id]) }}">@csrf<button type="submit" class="btn btn-outline-warning">Assign</button></form>
		                        </td>
		                    </tr>
		                    <tr class="spacer"></tr>
	                    @endforeach
	                </tbody>
	            </table>
	            <div class="row">
	            	<div class="col-md-6">{{ $verified_drivers->links() }}</div>
	            </div>
	        </div>
	        <!-- END DATA TABLE -->
	    </div>
	</div>
@endsection
