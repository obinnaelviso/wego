@extends('layouts.main')
@section('title', 'Dashboard - Verified Drivers')

@section('content')
	<div class="row m-t-75">
	    <div class="col-md-12">
	        <!-- DATA TABLE -->
	        <h3 class="title-5 m-b-40 m-l-40 m-t-40">verified drivers</h3>
	       {{--  <div class="table-data__tool">
	            <div class="table-data__tool-left">
	                <div class="rs-select2--light rs-select2--md">
	                    <select class="js-select2" name="property">
	                        <option selected="selected">All Properties</option>
	                        <option value="">Option 1</option>
	                        <option value="">Option 2</option>
	                    </select>
	                    <div class="dropDownSelect2"></div>
	                </div>
	                <div class="rs-select2--light rs-select2--sm">
	                    <select class="js-select2" name="time">
	                        <option selected="selected">Today</option>
	                        <option value="">3 Days</option>
	                        <option value="">1 Week</option>
	                    </select>
	                    <div class="dropDownSelect2"></div>
	                </div>
	                <button class="au-btn-filter">
	                    <i class="zmdi zmdi-filter-list"></i>filters</button>
	            </div>
	            <div class="table-data__tool-right">
	                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
	                    <i class="zmdi zmdi-plus"></i>add item</button>
	                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
	                    <select class="js-select2" name="type">
	                        <option selected="selected">Export</option>
	                        <option value="">Option 1</option>
	                        <option value="">Option 2</option>
	                    </select>
	                    <div class="dropDownSelect2"></div>
	                </div>
	            </div>
	        </div> --}}
	        <div class="table-responsive table-responsive-data2">
	            <table class="table table-data2">
	            	{{-- @if(session()->get('alert') == 0)
                        <div class="alert alert-danger">This account is blocked!</div>
                    @elseif(session()->get('alert') == 1)
                    	<div class="alert alert-success">This account is unblocked!</div>
                    @endif --}}
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
		                        	@if($driver->account_status==4) <span class="status--denied">Blocked</span>@else <span class="status--process">Verified</span> @endif
		                        </td>
		                        <td><div class="btn-group"><button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> block</button><button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> view</button></div>
		                        	{{-- <form method="POST" action="{{ route('frontdesk_driver_interview', $driver->id) }}">@csrf<button type="submit" class="btn btn-outline-primary">Send Interview</button></form> --}}
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
