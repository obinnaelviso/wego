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
    <title>Gogo - Register Driver</title>

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

    <link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Driver Registration</h2>
                    <form method="POST" action="{{ route('registerDriver') }}">
                        @csrf
                        <h2 class="title">User Account Details</h2>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="firstName">First Name</label>
                                    <input class="input--style-4" type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="lastName">Last Name</label>
                                    <input class="input--style-4" type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label >Gender</label>
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="address">Home Address</label>
                                    <input class="input--style-4" type="text" id="address" name="address" value="{{ old('address') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="email_address">Email</label>
                                    <input class="input--style-4" type="email" id="email_address" name="email_address" value="{{ old('email_address') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="phone_no">Phone Number</label>
                                    <input class="input--style-4" type="text" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="password">Password</label>
                                    <input class="input--style-4" type="password" id="password" name="password" required autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="password-confirmation">Re-Type Password</label>
                                    <input class="input--style-4" type="password" id="password-confirmation" name="password_confirmation" required autofocus>
                                </div>
                            </div>
                        </div>
                        <h2 class="title">Bank Details</h2>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="bank_verification_no">Bank Verification No. (BVN)</label>
                                    <input class="input--style-4" type="number" id="bank_verification_no" name="bank_verification_no" value="{{ old('bank_verification_no') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="bank_name">Bank Name</label>
                                    <input class="input--style-4" type="text" id="bank_name" name="bank_name" value="{{ old('bank_name') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="acc_name">Account Name</label>
                                    <input class="input--style-4" type="text" id="acc_name" name="acc_name" value="{{ old('acc_name') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="acc_number">Account Number</label>
                                    <input class="input--style-4" type="text" id="acc_number" name="acc_number" value="{{ old('acc_number') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="car_model">Account Type</label>
                                    <select class="form-control" id="acc_type" name="acc_type" onchange="if(this.selectedIndex) message();">
                                      <option>Choose Account Type:</option>
                                      <option name="acc_type" value="savings">Savings</option>
                                      <option name="acc_type" value="current">Current</option>
                                      <option name="acc_type" value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h2 class="title">Car Details</h2>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="car_name">Car Name</label>
                                    <input class="input--style-4" type="text" id="car_name" name="car_name" value="{{ old('car_name') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="plate_no">Plate Number</label>
                                    <input class="input--style-4" type="text" id="plate_no" name="plate_no" value="{{ old('plate_no') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="color">Color</label>
                                    <input class="input--style-4" type="text" id="color" name="color" value="{{ old('color') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="car_year">Year</label>
                                    <input class="input--style-4" type="text" id="car_year" name="car_year" value="{{ old('car_year') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label  for="car_model">Car Model</label>
                                    <select class="form-control" id="car_model" name="car_model">
                                      <option>Choose Car Model:</option>
                                      @foreach($car_models as $car_model)
                                        <option name="car_model" value="{{ $car_model->id }}">{{ ucfirst($car_model->name) }}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <label  for="car_img">Upload Car Image</label>
                                <div class="form-group">
                                    <input class="input--style-4" type="text" id="car_img" name="car_img" value="{{ old('car_img') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <label  for="drivers_license_img">Upload Driver's License</label>
                                <div class="form-group">
                                    <input class="input--style-4" type="text" id="drivers_license_img" name="drivers_license_img" value="{{ old('drivers_license_img') }}" required autofocus>
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
    <script>
        function message() {
            alert("Soft");
        }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->