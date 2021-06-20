<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') {{ $settings->site_title }} | RASEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_desc'){{ $settings->meta_desc }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/'. $settings->created_at->format('Y/m/').$settings->id.'/'.$settings->favicon) }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/jquery.animatedheadline.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/jquery-image-scroll.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-asset/css/responsive.css') }}">
</head>

<body data-spy="scroll" data-target=".main_menu" data-offset="50">

    <!--==========================
             NAV START
    ===========================-->
    <nav class="navbar navbar-expand-md fixed-top main_menu p-0">
        <div class="container">
            <span class="menu_icon">
                <i class="far fa-bars"></i>
            </span>
        </div>

        <div class="side_menu">
            <a href="{{ route('frontend') }}" class="navbar-brand">
                <img src="{{ asset('images/logo/'. $settings->created_at->format('Y/m/').$settings->id.'/'.$settings->logo) }}" alt="logo" class="img-fluid main-logo">
            </a>

            <span class="close_icon">
                <i class="fal fa-times"></i>
            </span>
            <ul class="side_menu">
                <li class="nav-item">
                    <a class="nav-link" href="#banner_part"><i class="fas fa-home"></i>home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about"><i class="fas fa-address-card"></i>about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#skill"><i class="far fa-lightbulb"></i>skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service"><i class="fas fa-globe"></i>service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#porifolio"><i class="fas fa-gift"></i>projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact"><i class="fas fa-comment-dots"></i>contact</a>
                </li>
            </ul>
            <ul class="side_menu_icon">
                <li><a href="{{ $socaillink->facebook }}" target="_blank"><i
                            class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{ $socaillink->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
                <li><a href="{{ $socaillink->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{ $socaillink->linkedin }}" target="_blank"><i
                            class="fab fa-linkedin-in"></i></a></li>
                <li><a href="{{ $socaillink->github }}" target="_blank"><i class="fab fa-github"></i></a></li>
            </ul>
            <div class="side_menu_text">
                <div class="side_menu_call">
                    <i class="fal fa-phone-alt"></i>
                    <a href="callto:{{ $contact->phone_one }}">{{ $contact->phone_one }}</a>
                </div>
                <div class="side_menu_mail">
                    <i class="fal fa-envelope"></i>
                    <a href="mailto:{{ $contact->email_one }}"> {{ $contact->email_one }}</a>
                </div>
                <div class="side_menu_add">
                    <i class="fal fa-map-marker-alt"></i>
                    <p>{{ $contact->address }}</p>
                </div>
            </div>
        </div>
    </nav>
    <!--==========================
               NAV END
    ===========================-->

    @yield('content')

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend-asset/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend-asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend-asset/js/bootstrap.min.js') }}"></script>
    <!--fontawesome.js -->
    <script src="{{ asset('frontend-asset/js/Font-Awesome.js') }}"></script>
    <!--type.js -->
    <script src="{{ asset('frontend-asset/js/jquery.animatedheadline.min.js') }}"></script>
    <!--parallax.js -->
    <script src="{{ asset('frontend-asset/js/parallax.min.js') }}"></script>
    <!--barfiller.js -->
    <script src="{{ asset('frontend-asset/js/jquery.barfiller.js') }}"></script>
    <!--wow.js-->
    <script src="{{ asset('frontend-asset/js/wow.min.js') }}"></script>
    <!--counter.js-->
    <script src="{{ asset('frontend-asset/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend-asset/js/jquery.counterup.min.js') }}"></script>
    <!--isotope.js-->
    <script src="{{ asset('frontend-asset/js/isotope.pkgd.min.js') }}"></script>
    <!--slick.js-->
    <script src="{{ asset('frontend-asset/js/slick.min.js') }}"></script>
    <!--jquery-image-scroll.js-->
    <script src="{{ asset('frontend-asset/js/jquery-image-scroll.js') }}"></script>
    <!--main.js-->
    <script src="{{ asset('frontend-asset/js/main.js') }}"></script>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/60c89b887f4b000ac037b5c1/1f87pv45m';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    @yield('footer_js')

</body>

</html>
