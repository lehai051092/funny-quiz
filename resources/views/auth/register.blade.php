<!DOCTYPE html>
<html lang="en">
<head>
    <title>Funny Quiz Register</title>
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
    <link rel="stylesheet" href="{{asset('storage/sign-up-form/css/style.css')}}" type="text/css" media="all"/>
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{asset('storage/sign-up-form/css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Snippet" rel="stylesheet"><!--online fonts-->
    <!-- //web-fonts -->
</head>
<body>
<div data-vide-bg="{{asset('storage/sign-up-form/video/keyboard')}}">
    <div class="main-container">
        <!--header-->
        <div class="header-w3l">
            <h1>Funny Quiz</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            <div class="w3ls-pro">
                <h2>Register Now</h2>
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
                    <span class="icon4"><span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" aria-hidden="true"></span></span>

                    <!--email-->
                    <input id="email" type="email" placeholder="Enter your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="icon3"><span toggle="#password-field" class="fa fa-envelope" aria-hidden="true"></span></span>


                    <!--password-->
                    <input id="password" type="password" placeholder="Enter your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="icon1"><i class="fa fa-fw fa-eye field_icon toggle-password"
                                           aria-hidden="true"></i></span>
                    <!--confirmPassword-->

                    <input id="password-confirm" type="password" placeholder="Confirm your Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <span class="icon"><i class="fa fa-fw fa-eye field_icon toggle-password"
                                           aria-hidden="true"></i></span>
                    <input type="submit" value="">
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
<script type="text/javascript" src="{{asset('storage/sign-up-form/js/jquery-2.1.4.min.js')}}"></script><!--common-js-->
<script src="{{asset('storage/sign-up-form/js/jquery.vide.min.js')}}"></script><!--video-js-->
<!-- //js -->

<script>
    $(document).on('click', '.toggle-password', function () {

        $(this).toggleClass("fa-eye fa-eye-slash");

        let input = $("#password,#password-confirm");
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');



    });
</script>
</body>
</html>

