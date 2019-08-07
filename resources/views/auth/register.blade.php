<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $shareData['system_name'] }}</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('public/others') }}/{{ $shareData['favicon'] }}">

     <link rel="stylesheet" href="{{ asset('public/admin/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('public/others') }}/{{ $shareData['admin_logo'] }}" alt="">
                    </a>
                </div>
                <div class="login-form">
                   <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>User Name</label>
                             <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                             <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                </div>
                        <div class="form-group">
                                <label>Confirm Password</label>
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{route('login')}}"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


  <script src="{{ asset('public/admin/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/main.js') }}"></script>


</body>
</html>
