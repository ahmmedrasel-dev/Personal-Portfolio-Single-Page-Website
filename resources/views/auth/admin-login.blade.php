<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Meteor | Login - Sign up</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="stacks" />

        <!-- Styles -->
        <link href="{{ asset('assets/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/uniform/css/default.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/meteor.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/layers/dark-layer.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>

        <script src="{{ asset('assets/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>
        <script src="{{ asset('assets/plugins/offcanvasmenueffects/js/snap.svg-min.js') }}"></script>

        <!-- Our project just needs Font Awesome solid + brand -->
        <script defer src="/your-path-to-fontawesome/js/brands.js"></script>
        <script defer src="/your-path-to-fontawesome/js/solid.js"></script>
        <script defer src="/your-path-to-fontawesome/js/fontawesome.js"></script>

    </head>
    <body class="page-login">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="panel panel-white" id="js-alerts">
                                <div class="panel-body">
                                    <div class="login-box">
                                        <a href="#" class="logo-name text-lg text-center m-t-xs">RASEL AHMMED</a>
                                        <p class="text-center m-t-md">Please login into your account.</p>

                                        {{-- Validation Message --}}
                                        <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />

                                        <form class="m-t-md" method="POST" action="{{ route('login') }}">
                                            @csrf

                                            {{-- Email Address  --}}
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email">
                                            </div>

                                            {{-- Password --}}
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control password" placeholder="Password">
                                            </div>

                                            {{-- Login Button --}}
                                            <button type="submit" class="btn btn-success btn-block">Login</button>

                                            {{-- Forget Password --}}
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                            @endif

                                            <ul class="side_menu_icon">
                                                <li>
                                                    <a href="https://www.facebook.com/dead.earth.sazal/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="https://www.linkedin.com/in/in-sazal/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('redirectToProvider') }}"><i class="fab fa-github"></i></a>
                                                </li>
                                            </ul>
                                            <p class="text-center m-t-xs text-sm">Do not have an account?</p>

                                            {{-- Create new Account --}}
                                            <a href="{{ route('register') }}" class="btn btn-default btn-block m-t-md">Create an account</a>
                                        </form>
                                        <p class="text-center m-t-xs text-sm">2021 &copy; rasel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->


        <!-- Javascripts -->
        <script src="{{ asset('frontend-asset/js/Font-Awesome.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pace-master/pace.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>
        <script src="{{ asset('assets/plugins/offcanvasmenueffects/js/classie.js') }}"></script>
        <script src="{{ asset('assets/plugins/waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/js/meteor.min.js') }}"></script>
    </body>
</html>
