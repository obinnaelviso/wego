@extends('layouts.main')
@section('title', 'Dashboard - Cancelled Bookings')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
			<div class="user-data m-b-30">
		        <!-- DATA TABLE -->
		        <h3 class="title-3 m-b-40 m-l-40 m-t-40">Cancelled Bookings</h3>
		        <div class="table-responsive table-data">
		            <table class="table table-data2">
		                <thead>
		                    <tr>
		                        <th>customer name</th>
		                        <th>customer email</th>
		                        <th>Driver</th>
		                        <th>car model</th>
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
			                        <td>{{ $booking->customer->first_name.' '.$booking->customer->last_name }}</td>
			                        <td><span class="block-email">{{ $booking->customer->email }}</span></td>
			                        <td>{{ $booking->driver->first_name.' '.$booking->driver->last_name }}</td>
			                        <td>{{ $booking->car_model->name }}</td>
			                        <td>{{ $booking->time }}</td>
			                        <td class="desc">{{ $booking->booking_time->name }}</td>
			                        <td>{{ $booking->cost }}</td>
			                        <td>{{ $booking->location }}</td>
			                        <td><i class="text-warning">Cancelled</i></td>
			                        <td><form method="POST" action="{{-- {{ route('frontdesk_cancel_booking', $booking->id) }} --}}">@csrf<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View</button></form>
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