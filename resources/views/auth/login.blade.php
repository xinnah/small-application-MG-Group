
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Product Application</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('public/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/theme/default.css')}}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('public/plugins/pace/pace.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<div class="login-cover">
    <div class="login-cover-image"><img src="{{asset('public/img/login-bg/bg-1.jpg')}}" data-id="login-cover-image" alt="" /></div>
    <div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> Product
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            <form class="margin-bottom-0" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group m-b-20 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" name="email" class="form-control input-lg" placeholder="Email Address" required />
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group m-b-20 {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Password" required />
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox" /> Remember Me
                    </label>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
                </div>
                <div class="m-t-20">
                    Forgot Your Password? Click <a href="{{ url('/password/reset') }}">here</a>
                </div>
            </form>
        </div>
    </div>
    <!-- end login -->

</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{asset('public/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery-ui/ui/minified/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!--[if lt IE 9]>
<script src="{{asset('public/crossbrowserjs/html5shiv.js')}}"></script>
<script src="{{asset('public/crossbrowserjs/respond.min.js')}}"></script>
<script src="{{asset('public/crossbrowserjs/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset('public/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{asset('public/js/login-v2.demo.min.js')}}"></script>
<script src="{{asset('public/js/apps.min.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        LoginV2.init();
    });
</script>

</body>
</html>

