@extends('layouts.main')
@section('title', 'Dashboard - New Cars')
@section('cars', 'active')
@section('new_cars', 'active')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	    	<div class="user-data m-b-30">
		        <!-- DATA TABLE -->
		        <h3 class="title-5 m-b-40 m-l-40 m-t-40">new cars</h3>
		        @if(count($cars))
			        <div class="table-responsive table-data">
			            <table class="table table-data2">
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
			                        <th>car model</th>
			                        <th>car make</th>
			                        <th>driver</th>
			                        <th>email address</th>
			                        <th>date registered</th>
			                        <th>status</th>
			                        <th>action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($cars as $car)
				                    <tr class="tr-shadow">
				                        <td>{{ ucfirst($car->car_model->name) }}</td>
				                        <td>{{ ucfirst($car->car_model->car_make->name) }}</td>
				                        <td class="desc">{{ $car->driver->first_name.' '.$car->driver->last_name }}</td>
				                        <td>{{ $car->driver->email }}</td>
				                        <td>{{ $car->created_at }}</td>
				                        <td><i class="text-warning">Unverified</i></td>
				                        <td>
				                        	<div class="btn-group">
				                        		<a href="{{ route('frontdesk_view_car', $car->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
				                        		<form method="POST" action="{{ route('frontdesk_reject_car', [$car->id, -2]) }}">@csrf<button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-ban"></i> Reject</button></form>
				                        		<form method="POST" action="{{ route('frontdesk_verify_car', $car->id) }}">@csrf<button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Verify</button></form>
				                        	</div>
				                        </td>
				                    </tr>
				                    <tr class="spacer"></tr>
			                    @endforeach
			                </tbody>
			            </table>
			            <div class="row">
			            	<div class="col-md-6">{{ $cars->links() }}</div>
			            </div>
			        </div>
			    @else
			    	<div class="alert alert-warning m-b-250">
                    	No records available for new cars!
                	</div>
			    @endif
		        <!-- END DATA TABLE -->
	   		</div>
		</div>
	</div>
@endsection
