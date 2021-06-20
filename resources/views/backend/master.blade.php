<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Meteor | Responsive Admin Dashboard Template</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="stacks" />
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
        <link href="{{ asset('assets/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/weather-icons-master/css/weather-icons.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

        <!-- Theme Styless -->
        <link href="{{ asset('assets/css/meteor.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/layers/dark-layer.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>

        <script src="{{ asset('assets/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>

    </head>
    <body class="compact-menu">
        <div class="overlay"></div>

        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search" type="button"><i class="icon-close"></i></button>
                </span>
            </div>
            <!-- Input Group -->
        </form>
        <!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button push-sidebar">
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="{{ route('dashboard') }}" target="_blank" class="logo-text"><span>RASEL</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-settings"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Header
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-header-check" checked>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Sidebar
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-sidebar-check" checked>
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Horizontal bar
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right horizontal-bar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Toggle Sidebar
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Compact Menu
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right compact-menu-check" checked>
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Hover Menu
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right hover-menu-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Boxed Layout
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right boxed-layout-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="user-name">{{ Auth::user()->name ?? 'N/A' }}<i class="fa fa-angle-down"></i></span>
                                        <img class="img-circle avatar" src="{{ asset('assets/images/avatar1.png') }}" width="40" height="40" alt="">
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.html"><i class="icon-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="calendar.html"><i class="icon-calendar"></i>Calendar</a></li>
                                        <li role="presentation"><a href="inbox.html"><i class="icon-envelope-open"></i>Inbox<span class="badge badge-success pull-right">4</span></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="lock-screen.html"><i class="icon-lock"></i>Lock screen</a></li>

                                        <li role="presentation">
                                            <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('login-form').submit();">
                                                <i class="icon-key m-r-xs"></i><span>{{ __('Logout') }}</span>
                                            </a>
                                            <form action="{{ route('logout') }}" id="login-form" method="POST" style="display:none">
                                                @csrf
                                            </form>

                                        </li>
                                    </ul>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <ul class="menu accordion-menu">
                        <li class="@yield('desktop-active')"><a href="{{ route('dashboard') }}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Dashboard</p><span class="active-page"></span></a></li>
                        {{-- Profile Link --}}
                        <li><a href="profile.html" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Profile</p></a></li>

                        {{-- Banner Section Menu --}}
                        <li class="droplink @yield('banner-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-picture"></span><p>Banner Section</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('banner-sub-active')"><a href="{{ route('banner.index') }}">Banner</a></li>
                                <li class="@yield('button-sub-active')"><a href="{{ route('button') }}">Banner Button</a></li>
                            </ul>
                        </li>

                        {{-- Project Section Menu --}}
                        <li class="droplink @yield('project-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-present "></span><p>Project</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('project-sub-active')"><a href="{{ route('project.index') }}">Project</a></li>
                            </ul>
                        </li>

                        {{-- Category Menu --}}
                        <li class="droplink @yield('active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-grid"></span><p>Category</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('category-active')"><a href="{{ route('category.index') }}">Category</a></li>
                            </ul>
                        </li>

                        {{-- About Section Menu --}}
                        <li class="droplink @yield('about-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>About Section</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('about-sub-active')"><a href="{{ route('about.index') }}">About</a></li>
                            </ul>
                        </li>

                        {{-- Contact Section Menu --}}
                        <li class="droplink @yield('contact-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-call-out"></span><p>Contact</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('contact-sub-active')"><a href="{{ route('contactIndex') }}">Contact</a></li>
                            </ul>
                        </li>

                        {{-- Education Section Menu --}}
                        <li class="droplink @yield('education-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-graduation"></span><p>Education</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('education-sub-active')"><a href="{{ route('education.index') }}">Education</a></li>
                                <li class="@yield('education-trash-active')"><a href="{{ route('trashList') }}">Trash</a></li>
                            </ul>
                        </li>

                        {{-- Experiece Section Menu --}}
                        <li class="droplink @yield('experience-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-briefcase"></span><p>Experience</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('experience-sub-active')"><a href="{{ route('experience.index') }}">Experience</a></li>
                                <li class="@yield('experience-sub-active')"><a href="{{ route('ExTrashList') }}">Trash</a></li>
                            </ul>
                        </li>

                        {{-- Skill Section Menu --}}
                        <li class="droplink @yield('skill-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-bulb"></span><p>Skill</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('skill-sub-active')"><a href="{{ route('skill.index') }}">Skills</a></li>
                                <li class="@yield('skill-trash-active')"><a href="{{ route('skillTrashList') }}">Trash</a></li>
                            </ul>
                        </li>

                        {{-- Services Section Menu --}}
                        <li class="droplink @yield('service-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-globe"></span><p>Service</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('service-sub-active')"><a href="{{ route('service.index') }}">Service</a></li>
                                <li class="@yield('service-trash-active')"><a href="{{ route('serviceTrashList') }}">Trash</a></li>
                            </ul>
                        </li>

                        {{-- Testimonial Section Menu --}}
                        <li class="droplink @yield('testimonial-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-speech "></span><p>Testimonial</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('testimonial-sub-active')"><a href="{{ route('testimonial.index') }}">Testimonial</a></li>
                                <li class="@yield('testimonial-trash-active')"><a href="{{ route('testimonialTrashList') }}">Trash</a></li>
                            </ul>
                        </li>

                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-envelope-open"></span><p>Mailbox</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="inbox.html">Inbox</a></li>
                                <li><a href="message-view.html">View Message</a></li>
                                <li><a href="compose.html">Compose</a></li>
                            </ul>
                        </li>

                        {{-- Socail Link Menu --}}
                        <li class="droplink @yield('social-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon  icon-social-dropbox "></span><p>Social Links</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('social-sub-active')"><a href="{{ route('sociallink.index') }}">Social Links</a></li>
                            </ul>
                        </li>

                        {{-- Footer Section Menu --}}
                        <li class="droplink @yield('setting-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon  icon-settings"></span><p>Setting</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('setting-sub-active')"><a href="{{ route('setting.index') }}">Setting</a></li>
                            </ul>
                        </li>

                        {{-- Footer Section Menu --}}
                        <li class="droplink @yield('footer-active')"><a href="#" class="waves-effect waves-button"><span class="menu-icon  icon-hourglass"></span><p>Footer</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="@yield('footer-sub-active')"><a href="{{ route('footer.index') }}">Footer</a></li>
                            </ul>
                        </li>

                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->

            @yield('content')

        </main>


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
        <script src="{{ asset('assets/plugins/3d-bold-navigation/js/main.js') }}"></script>
        <script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script> --}}
        <script src="{{ asset('assets/plugins/flot/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/curvedlines/curvedLines.js') }}"></script>
        <script src="{{ asset('assets/plugins/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/meteor.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @yield('footer_js')
        <script>
            @if (Session::has('message'));
            var type =  "{{ Session::get('alert-type', 'info') }}"
            switch(type){
                    case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                    case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                    case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
            }
            @endif
        </script>
        @include('sweetalert::alert')

    </body>
</html>
