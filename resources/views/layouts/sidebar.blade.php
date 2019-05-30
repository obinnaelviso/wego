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
                    <a href="#">
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
                            <a href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
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
                            <a href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
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
                                <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>