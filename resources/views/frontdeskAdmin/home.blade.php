@extends('layouts.main')
@section('title', 'Dashboard - Home')

@section('content')
	<!-- STATISTIC-->
	<section class="statistic m-t-75 m-b-200">
	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-md-6 col-lg-3">
	                    <div class="statistic__item">
	                        <h2 class="number">10,368</h2>
	                        <span class="desc">new drivers registered</span>
	                        <div class="icon">
	                            <i class="zmdi zmdi-account-o"></i>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-6 col-lg-3">
	                    <div class="statistic__item">
	                        <h2 class="number">388,688</h2>
	                        <span class="desc">total bookings</span>
	                        <div class="icon">
	                            <i class="fas fa-list"></i>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-6 col-lg-3">
	                    <div class="statistic__item">
	                        <h2 class="number">1,086</h2>
	                        <span class="desc">confirmed payment</span>
	                        <div class="icon">
	                            <i class="zmdi zmdi-calendar-note"></i>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-6 col-lg-3">
	                    <div class="statistic__item">
	                        <h2 class="number">$1,060,386</h2>
	                        <span class="desc">completed bookings</span>
	                        <div class="icon">
	                            <i class="zmdi zmdi-money"></i>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- END STATISTIC-->
@endsection