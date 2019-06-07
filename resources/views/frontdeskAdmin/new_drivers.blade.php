@extends('layouts.main')
@section('title', 'Dashboard - New Drivers')
@section('drivers', 'active')
@section('new_drivers', 'active')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">new drivers</h3>
	        @if(count($drivers))
		        <div class="table-responsive table-data">
		            <table class="table table-data2">
		            	@if(session()->has('alert'))
	                        <div class="alert alert-warning">
	                            {{ session()->get('alert') }}
	                        </div>
	                     @endif
	                     @if(session()->has('alert_reject'))
	                        <div class="alert alert-danger">
	                            {{ session()->get('alert_reject') }}
	                        </div>
		                @endif
		                <thead>
		                    <tr>
		                        <th>name</th>
		                        <th>email</th>
		                        <th>phone number</th>
		                        <th>date</th>
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
			                        <td class="desc">{{ $driver->phone_number }}</td>
			                        <td>{{ $driver->created_at->format('d M Y') }}</td>
			                        <td>
			                        	<span class="status--process">New</span>
			                        </td>
			                        <td>
			                        	<div class="btn-group">
			                        		<a href="{{ route('frontdesk_view_driver', $driver->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
			                        		<form method="POST" action="{{ route('frontdesk_reject_driver', [$driver->id, -2]) }}">@csrf<button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-paper-plane"></i> Reject</button></form>
			                        		<form method="POST" action="{{ route('frontdesk_driver_interview', $driver->id) }}">@csrf<button type="submit" class="btn btn-warning btn-sm"> <i class="fas fa-paper-plane"></i> Send Interview</button></form>
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
	        @else
	        	<div class="alert alert-warning m-b-250">
                    No records available for new drivers!
                </div>
	        @endif
	    </div>
	</div>
@endsection
