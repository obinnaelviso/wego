<div class="menu-sidebar2__content js-scrollbar2">
        <div class="account2" style="height: 5px">
            <h4 class="name" style="font-size: 17px"><span>Admin:</span> {{ Auth::guard('frontdeskAdmin')->user()->first_name.' '.Auth::guard('frontdeskAdmin')->user()->last_name }}</h4>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="">
                    <a href="{{ route('frontdesk_home') }}">
                        <i class="fas fa-home"></i>Home</a>
                </li>
                <li class="has-sub @yield('drivers')">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-globe"></i>Manage Drivers
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @yield('new_drivers') ">
                            <a href="{{ route('frontdesk_new_drivers') }}">
                                <i class="fas fa-globe"></i>New Drivers</a>
                        </li>
                        <li class="@yield('interview_drivers')">
                            <a href="{{ route('frontdesk_interview_drivers') }}">
                                <i class="fas fa-globe"></i>Interviewed Drivers</a>
                        </li>
                        <li class="@yield('verified_drivers')">
                            <a href="{{ route('frontdesk_verified_drivers')}}">
                                <i class="fas fa-globe"></i>Verified Drivers</a>
                        </li>
                        <li class="@yield('blocked_drivers')">
                            <a href="{{ route('frontdesk_blocked_drivers') }}">
                                <i class="fas fa-globe"></i>Blocked Drivers</a>
                        </li>
                        <li class="@yield('booked_drivers')">
                            <a href="{{ route('frontdesk_booked_drivers') }}">
                                <i class="fas fa-globe"></i>Booked Drivers</a>
                        </li>
                        <li class="@yield('rejected_drivers')">
                            <a href="{{ route('frontdesk_rejected_drivers') }}">
                                <i class="fas fa-globe"></i>Rejected Drivers</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub @yield('bookings')">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-list"></i>Manage Bookings
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="@yield('pending_bookings')">
                            <a href="{{ route('frontdesk_pending_bookings') }}">
                                <i class="fas fa-list"></i>Pending Bookings</a>
                        </li>
                        <li class="@yield('assign_drivers')">
                            <a href="{{ route('frontdesk_assign_drivers') }}">
                                <i class="fas fa-list"></i>Assign Drivers</a>
                        </li>
                        <li class="@yield('active_bookings')">
                            <a href="{{ route('frontdesk_active_bookings') }}">
                                <i class="fas fa-list"></i>Active Bookings</a>
                        </li>
                        <li class="@yield('completed_bookings')">
                            <a href="{{ route('frontdesk_completed_bookings') }}">
                                <i class="fas fa-list"></i>Completed Bookings</a>
                        </li>
                        <li class="@yield('reviewed_bookings')">
                            <a href="{{ route('frontdesk_reviewed_bookings') }}">
                                <i class="fas fa-list"></i>Reviewed Bookings</a>
                        </li>
                        <li class="@yield('cancelled_bookings')">
                            <a href="{{ route('frontdesk_cancelled_bookings') }}">
                                <i class="fas fa-list"></i>Cancelled Bookings</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub @yield('cars')">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-suitcase"></i>Manage Cars
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="@yield('new_cars')">
                            <a href="{{ route('frontdesk_new_cars') }}">
                                <i class="fas fa-suitcase"></i>New Cars</a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="@yield('verified_cars')">
                            <a href="{{ route('frontdesk_verified_cars') }}">
                                <i class="fas fa-suitcase"></i>Verified Cars</a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="@yield('rejected_cars')">
                            <a href="{{ route('frontdesk_rejected_cars') }}">
                                <i class="fas fa-suitcase"></i>Rejected Cars</a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="@yield('banned_cars')">
                            <a href="{{ route('frontdesk_banned_cars') }}">
                                <i class="fas fa-suitcase"></i>Banned Cars</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>Manage Customers
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">
                                <i class="fas fa-users"></i>All Customers</a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
    </div>