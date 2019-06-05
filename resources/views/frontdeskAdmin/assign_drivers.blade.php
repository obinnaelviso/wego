@extends('layouts.main')
@section('title', 'Dashboard - Assign Driver')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
			<div class="user-data m-b-30">
		        <!-- DATA TABLE -->
		        <h3 class="title-3 m-b-40 m-l-40 m-t-40">assign driver</h3>
		        <div class="table-responsive table-data">
		            <table class="table table-data2">
		            	@if(session()->has('alert'))
	                        <div class="alert alert-success">
	                            {{ session()->get('alert') }}
	                        </div>
	                     @endif
		                <thead>
		                    <tr>
		                        <th>customer name</th>
		                        <th>email</th>
		                        <th>phone number</th>
		                        <th>car model</th>
		                        <th>car category</th>
		                        <th>schedule</th>
		                        <th>booking type</th>
		                        <th>total_cost</th>
		                        <th>location</th>
		                        <th>status</th>
		                        <th>action</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($bookings as $booking)
			                    <tr class="tr-shadow">
			                        <td>{{ ucfirst($booking->customer->first_name.' '.$booking->customer->last_name) }}</td>
			                        <td><span class="block-email">{{ $booking->customer->email }}</span></td>
			                        <td>{{ $booking->customer->phone_number}}</td>
			                        <td>{{ ucfirst($booking->car_model->name)}}</td>
			                        <td>{{ ucfirst($booking->car_model->car_make->car_category->name)}}</td>
			                        <td>{{ $booking->time}}</td>
			                        <td class="desc">{{ $booking->booking_time->name }}</td>
			                        <td>{{ $booking->cost }}</td>
			                        <td>{{ $booking->location }}</td>
			                        <td><i class="text-success">Payment Confirmed</i></td>
			                        <td><div class="btn-group"><a href="{{ route('frontdesk_view_booking', $booking->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a><form method="POST" action="{{ route('frontdesk_drivers_cars', $booking->id) }}">@csrf<button type="submit" class="btn btn-sm btn-outline-success">Assign a Driver</button></form>
			                        </td>
			                    </tr>
			                    <tr class="spacer"></tr>
		                    @endforeach
		                </tbody>
		            </table>
		            <div class="row">
		            	<div class="col-md-6">{{ $bookings->links() }}</div>
		            </div>
		        </div>
		        <!-- END DATA TABLE -->
		    </div>
	    </div>
	</div>
@endsection
