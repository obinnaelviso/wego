<div class="menu-sidebar2__content js-scrollbar2">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="/images/icon/avatar-big-01.jpg" alt="John Doe" />
            </div>
            <h4 class="name">{{ Auth::guard('frontdeskAdmin')->user()->first_name.' '.Auth::guard('frontdeskAdmin')->user()->last_name }}</h4>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="active">
                    <a href="{{ route('frontdesk_home') }}">
                        <i class="fas fa-home"></i>Home</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-globe"></i>Manage Drivers
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('frontdesk_new_drivers') }}">
                                <i class="fas fa-globe"></i>New Drivers</a>
                        </li>
                        <li>
                            <a href="{{ route('frontdesk_interview_drivers') }}">
                                <i class="fas fa-globe"></i>Interviewed Drivers</a>
                        </li>
                        <li>
                            <a href="{{ route('frontdesk_verified_drivers')}}">
                                <i class="fas fa-globe"></i>Verified Drivers</a>
                        </li>
                        <li>
                            <a href="index2.html">
                                <i class="fas fa-tachometer-alt"></i>Booked Drivers</a>
                        </li>
                        <li>
                            <a href="index3.html">
                                <i class="fas fa-tachometer-alt"></i>Rejected Drivers</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-list"></i>Manage Bookings
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('frontdesk_pending_bookings') }}">
                                <i class="fas fa-tachometer-alt"></i>Pending Bookings</a>
                        </li>
                        <li>
                            <a href="{{ route('frontdesk_assign_drivers') }}">
                                <i class="fas fa-tachometer-alt"></i>Assign Drivers</a>
                        </li>
                        <li>
                            <a href="index3.html">
                                <i class="fas fa-tachometer-alt"></i>Active Bookings</a>
                        </li>
                        <li>
                            <a href="index4.html">
                                <i class="fas fa-tachometer-alt"></i>Completed Bookings</a>
                        </li>
                        <li>
                            <a href="index4.html">
                                <i class="fas fa-tachometer-alt"></i>Cancelled Bookings</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>Manage Customers
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">
                                <i class="fas fa-tachometer-alt"></i>All Customers</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>