@section('header_style', 'background-color: Purple; height: 70px')
<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        @include('layouts.leftSidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2"  style="@yield('header_style')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="/images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <!-- MAIN HEADER -->
                            @include('layouts.header')
                        </div>
                    </div>
                </div>
            </header>

            <!-- SIDE BAR -->
            @include('layouts.rightSidebar')
            <!-- END HEADER DESKTOP-->

            @yield('content')

           @include('layouts.footer')
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

@include('layouts.js')

</body>

</html>
<!-- end document-->