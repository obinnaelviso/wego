@extends('layouts.main')
@section('title', 'Dashboard - Rejected Drivers')
@section('drivers', 'active')
@section('rejected_drivers', 'active')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">rejected drivers</h3>
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
	                        <th>date registered</th>
	                        <th>status</th>
	                        <th>reason</th>
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
		                        <td>{{ $driver->created_at->format('d M Y')}}</td>
		                        <td><i class="status--denied">Rejected</i></td>
		                        <td><strong class="status--denied">@if($driver->account_status == -2) Invalid Profile @elseif($driver->account_status == -1) Failed Interview @endif</strong></td>
		                        <td>
		                        	<div class="btn-group"><a href="{{ route('frontdesk_view_driver', $driver->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
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
