<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gogo - Frontdesk Admin Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->  
        <link rel="icon" type="image/png" href="/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/login/vendor/animate/animate.css">
    <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/login/css/util.css">
        <link rel="stylesheet" type="text/css" href="/login/css/main.css">
    <!--===============================================================================================-->
    </head>
    <body>
        
        <div class="limiter">
            <div class="container-login100" style="background-image: url('/images/bg-01.jpg');">
                <div class="wrap-login100">

                    <form class="login100-form validate-form"  method="POST" action="{{ route('frontdesk_login') }}">
                        @csrf
                        <span class="login100-form-logo">
                            <i class="zmdi zmdi-landscape"></i>
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
                            Log in
                        </span>
                        @if(session()->has('errorLogin'))
                            <div class="alert alert-danger">
                                {{ session()->get('errorLogin') }}
                            </div>
                         @endif
                        <div class="wrap-input100 validate-input" data-validate = "Enter email address">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>

                        <div class="text-center p-t-90">
                            <a class="txt1" href="#">
                                Forgot Password?
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        

        <div id="dropDownSelect1"></div>
        
    <!--===============================================================================================-->
        <script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
        <script src="/login/vendor/bootstrap/js/popper.js"></script>
        <script src="/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
        <script src="/login/vendor/daterangepicker/moment.min.js"></script>
        <script src="/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="/login/js/main.js"></script>

    </body>
</html>