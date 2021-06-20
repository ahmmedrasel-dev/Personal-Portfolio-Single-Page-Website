<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Rasel | Login - Sign up</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="stacks" />

        <!-- Styles -->
        <link href="{{ asset('assets/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/uniform/css/default.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
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

    </head>
    <body class="page-register">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="panel panel-white" id="js-alerts">
                                <div class="panel-body">
                                    <div class="register-box">
                                        <a href="#" class="logo-name text-lg text-center m-t-xs">RASEL AHMMED</a>
                                        <p class="text-center m-t-md">Create an account.</p>

                                         {{-- Validation Message --}}
                                         <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />

                                        <form class="m-t-md" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            {{-- Full Name --}}
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                                            </div>

                                            {{-- Email Address --}}
                                            <div class="form-group">
                                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                                            </div>

                                            {{-- Password --}}
                                            <div class="form-group">
                                                <input type="password" name="password" value="{{ old('password') }}" class="password form-control" placeholder="Password">
                                            </div>

                                            {{-- Confirm Password --}}
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="password form-control" placeholder="Confirm Password">
                                            </div>

                                            <label>
                                                <input type="checkbox" required> Agree the terms and policy
                                            </label>

                                            {{-- Submit Button --}}
                                            <button type="submit" class="btn btn-success btn-block m-t-xs">Submit</button>
                                            <p class="text-center m-t-xs text-sm">Already have an account?</p>

                                            {{-- Login Button --}}
                                            <a href="{{ route('login') }}" class="btn btn-default btn-block m-t-xs">Login</a>
                                        </form>

                                        <p class="text-center m-t-xs text-sm">2021 &copy; Rasel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->


        <!-- Javascripts -->
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
