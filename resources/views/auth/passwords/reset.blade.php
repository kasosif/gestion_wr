<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title> Gestion WR | Password Reset </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>


<body class="auth-fluid-pages pb-0">

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-left">
                    <div class="auth-logo">
                        <a href="{{route('home')}}" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets/images/logo-dark.png')}}" alt="" style="height: 60px">
                                    </span>
                        </a>

                        <a href="{{route('home')}}" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="22">
                                    </span>
                        </a>
                    </div>
                </div>

                <!-- title-->
                <h4 class="mt-0">{{ __('Reset Password') }}</h4>
                <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                <!-- form -->
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control validate {{ $errors->has('email') ? ' is-invalid' : '' }} " type="email"  name="email" value="{{ request()->input('email') }}" required autofocus>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit">Reset Password </button>
                    </div>
                </form>
                <!-- end form-->

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

</div>
<!-- end auth-fluid-->


<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
</body>
</html>
