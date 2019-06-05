@extends('layouts.main')
@section('title', 'Dashboard - Blocked Drivers')
@section('drivers', 'active')
@section('blocked_drivers', 'active')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">blocked drivers</h3>
	        <div class="table-responsive table-responsive-data2">
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
		                        <td><i class="status--denied">Blocked</i>
		                        </td>
		                        <td>
		                        	<div class="btn-group">
		                        		<form method="POST" action="{{ route('frontdesk_send_unblock', $driver->id) }}">@csrf<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-ban"></i> Un-Block</button></form>
		                        		<a href="{{ route('frontdesk_view_driver', $driver->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
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
@endsection
