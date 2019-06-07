@extends('layouts.main')
@section('title', 'Dashboard - Interviewed Drivers')
@section('drivers', 'active')
@section('interview_drivers', 'active')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">Interviewed drivers</h3>
	        @if(count($drivers))
		        <div class="table-responsive table-responsive-data2">
		            <table class="table table-data2">
		            	{{-- Show alert when send verified button pressed --}}
		            	@if(session()->has('alert'))
	                        <div class="alert alert-success">
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
			                        	<span class="status--process text-warning">Interview</span>
			                        </td>
			                        <td>
			                        	<div class="btn-group">
			                        		<a href="{{ route('frontdesk_view_driver', $driver->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
			                        		<form method="POST" action="{{ route('frontdesk_reject_driver', [$driver->id, -1]) }}">@csrf<button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-paper-plane"></i> Reject</button></form>
			                        		<form method="POST" action="{{ route('frontdesk_driver_verified', $driver->id) }}">@csrf<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Send Verified</button>
			                        		</form>
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
		    @else
	        	<div class="alert alert-warning m-b-250">
                    No records available for interviewed drivers!
                </div>
            @endif

	        <!-- END DATA TABLE -->
	    </div>
	</div>
@endsection
