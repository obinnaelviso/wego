@extends('layouts.main')
@section('title', 'Dashboard - Drivers Location')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">drivers cars</h3>
	        <div class="table-responsive table-responsive-data2">
	            <table class="table table-data2">
	                <thead>
	                    <tr>
	                        <th>driver name</th>
	                        <th>car name</th>
	                        <th>car model</th>
	                        <th>email</th>
	                        <th>phone number</th>
	                        <th>location</th>
	                        <th>action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	{{ drivers_cars }}
	                	@foreach($drivers_cars as $drivers_car)
		                    <tr class="tr-shadow">
		                        <td>{{ $drivers_car->driver->first_name.' '.$driver->driver->last_name }}</td>
		                        <td>
		                            {{ $drivers_car->name }}
		                        </td>
		                        <td>
		                            {{ $drivers_car->car_model->name }}
		                        </td>
		                        <td>
		                            <span class="block-email">{{ $drivers_car->driver->email }}</span>
		                        </td>
		                        <td class="desc">{{ $drivers_car->driver->phone_number }}</td>
		                        <td>{{ $drivers_car->driver->location->name }}</td>
		                        <td><form method="POST" action="{{ route('frontdesk_send_driver', [$booking->id,$driver->driver->id]) }}">@csrf<button type="submit" class="btn btn-outline-warning">Assign</button></form>
		                        </td>
		                    </tr>
		                    <tr class="spacer"></tr>
	                    @endforeach
	                </tbody>
	            </table>
{{-- 	            <div class="row">
	            	<div class="col-md-6">{{ $verified_drivers->links() }}</div>
	            </div> --}}
	        </div>
	        <!-- END DATA TABLE -->
	    </div>
	</div>
@endsection
