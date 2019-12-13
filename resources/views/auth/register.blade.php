<!DOCTYPE html>
<html lang="en">
<head>
    <title>Funny Quiz Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Modern Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="{{asset('storage/login-form/css/style.css')}}" type="text/css" media="all"/>
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{asset('storage/login-form/css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Snippet" rel="stylesheet"><!--online fonts-->
    <!-- //web-fonts -->
</head>
<body>
<div data-vide-bg="{{asset('storage/login-form/video/keyboard')}}">
    <div class="main-container">
        <!--header-->
        <div class="header-w3l">
            <h1>Funny Quiz</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            <div class="w3ls-pro">
                <h2>Login Now</h2>
            </div>
            <div class="sub-main-w3ls">
                <form action="{{ route('register') }}" method="POST">
                @csrf
                <!--username-->
                    <input id="name" placeholder="Username..." type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="icon1"><span toggle="#password-field" class="fa fa-envelope" aria-hidden="true"></span></span>

                    <!--email-->
                    <input id="email" type="email" placeholder="Enter your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="icon1"><span toggle="#password-field" class="fa fa-envelope" aria-hidden="true"></span></span>


                    <!--password-->
                    <input id="password" type="password" placeholder="Enter your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="icon2"><i class="fa fa-fw fa-eye field_icon toggle-password"
                                           aria-hidden="true"></i></span>
                    <!--confirmPassword-->

                    <input id="password-confirm" type="password" placeholder="Confirm your Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <span class="icon2"><i class="fa fa-fw fa-eye field_icon toggle-password"
                                           aria-hidden="true"></i></span>


                    <div class="checkbox-w3">
                        <span class="check-w3"> <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember me') }}
                        </span>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <div class="clear"></div>
                    </div>
                    <div class="m-5">
                        <p style="color:burlywood;">
                            If you do not already have an account, please
                            <a style="color: aqua" href="{{ route('register') }}">{{ __('Register') }}</a>
                            now.
                        </p>
                    </div>
                    <br>
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </form>

            </div>

        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">

        </div>
        <!--//footer-->
    </div>
</div>
<!-- js -->
<script type="text/javascript" src="{{asset('storage/login-form/js/jquery-2.1.4.min.js')}}"></script><!--common-js-->
<script src="{{asset('storage/login-form/js/jquery.vide.min.js')}}"></script><!--video-js-->
<!-- //js -->

<script>
    $(document).on('click', '.toggle-password', function () {

        $(this).toggleClass("fa-eye fa-eye-slash");

        let input = $("#password");
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
    });
</script>
</body>
</html>





{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container m-5">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card mt-5">--}}
{{--                <div class="card-header"><h3><i class="fa">{{ __('Register') }}</i></h3></div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
