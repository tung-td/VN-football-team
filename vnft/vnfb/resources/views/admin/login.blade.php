<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/server/img/custom/logo/LogoVN.webp')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/custom/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/custom/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/normalize.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/main.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/custom/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/custom/calendar/fullcalendar.print.min.css')}}">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/form/all-type-forms.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('public/server/css/custom/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="index.html" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>PLEASE LOGIN TO ADMIN PAGE</h3>
                    <p>Welcome to Davinci admin</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form id="loginForm" class="user" action="{{URL('/admin-dashboard')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="admin_user" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="admin_password" id="password" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <p style="color: red; font-size: 12px;">
                                <?php
                                use Illuminate\Support\Facades\Session;
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                            </p>
                            <div class="checkbox login-checkbox">
                                <label>
									<input type="checkbox" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="#">Register</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="{{asset('public/server/js/custom/vendor/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('public/server/js/custom/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/server/js/custom/metisMenu/metisMenu-active.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/tab.js')}}"></script>
    <!-- icheck JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('public/server/js/custom/icheck/icheck-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('public/server/js/custom/main.js')}}"></script>
</body>

</html>