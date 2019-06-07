@extends('layouts.main')
@section('title', 'Dashboard - Rejected Cars')
@section('cars', 'active')
@section('rejected_cars', 'active')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">Rejected cars</h3>
	        @if(count($cars))
		        <div class="table-responsive table-responsive-data2">
		            <table class="table table-data2">
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
			                        <td><i class="text-danger">Rejected</i></td>
			                        <td>
		                        		<a href="{{ route('frontdesk_view_car', $car->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
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
		    	<div class="alert alert-danger m-b-250">
                	No records available for rejected cars!
            	</div>
		    @endif
	        <!-- END DATA TABLE -->

		</div>
	</div>
@endsection
