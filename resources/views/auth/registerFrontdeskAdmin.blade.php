<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gogo Web">
    <meta name="author" content="Gogo Web">
    <meta name="keywords" content="Gogo Web">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title Page-->
    <title>Gogo - Register Frontdesk</title>

    <!-- Icons font CSS-->
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Frontdesk Admin Registration</h2>
                    <form method="POST" action="{{ route('registerFrontdesk') }}">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="firstName">first name</label>
                                    <input class="input--style-4" type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="lastName">last name</label>
                                    <input class="input--style-4" type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="sex" value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45">Female
                                            <input type="radio" name="sex" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="email_address">Email</label>
                                    <input class="input--style-4" type="email" id="email_address" name="email_address" value="{{ old('email_address') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="phone_no">Phone Number</label>
                                    <input class="input--style-4" type="text" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="password">password</label>
                                    <input class="input--style-4" type="password" id="password" name="password" required autofocus>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="password-confirmation">re-type password</label>
                                    <input class="input--style-4" type="password" id="password-confirmation" name="password_confirmation" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form> <br>
                    @if(count($errors))
                        <div class="alert alert-danger"><ul>
                        @foreach($errors->all() as $error)
                             
                                <li>{{ $error }}</li>
                            
                        @endforeach
                        </ul></div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="/vendor/select2/select2.min.js"></script>
    <script src="/vendor/datepicker/moment.min.js"></script>
    <script src="/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->