@extends('layouts.main')
@section('title', 'Dashboard - New Drivers')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">new drivers</h3>
	        <div class="table-responsive table-responsive-data2">
	            <table class="table table-data2">
	            	@if(session()->has('alert'))
                        <div class="alert alert-warning">
                            {{ session()->get('alert') }}
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
		                        <td><form method="POST" action="{{ route('frontdesk_driver_interview', $driver->id) }}">@csrf<button type="submit" class="btn btn-outline-primary">Send Interview</button></form>
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
@endsection
