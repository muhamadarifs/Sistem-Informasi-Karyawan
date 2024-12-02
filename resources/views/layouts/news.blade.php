<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($title))
            {{ $title }} | HRISPA
        @else
            HRISPA | Human Resources Information System Personal Admin
        @endif
    </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/li-scroller.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.fancybox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
</head>
<body>
    {{-- <div id="preloader">
        <div id="status">&nbsp;</div>
    </div> --}}
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    {{-- <div class="header_top">
                        <div class="header_top_left">
                            <p><a href="{{ route('dashboard') }}">Back</a></p>
                        </div>
                        <div class="header_top_right">
                            <p>{{ \Carbon\Carbon::now()->format('l, F d, Y') }}</p>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <div class="logo_area"><a href="../index.html" class="logo"><img src="{{ asset('assets/img/LogoNews.png') }}" alt=""></a></div>
                        {{-- <div class="add_banner"><a href="#"><img src="../images/addbanner_728x90_V1.jpg" alt=""></a></div> --}}
                    </div>
                </div>
            </div>
        </header>
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    {{-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> --}}
                    <p class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="border: none; pointer-events: none; color: #ffffff;">{{ \Carbon\Carbon::now()->format('l, F d, Y') }}</p>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        <p class="" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="border: none; pointer-events: none; color: #ffffff; ">{{ \Carbon\Carbon::now()->format('l, F d, Y') }}</p>
                    </ul>
                </div>
            </nav>
        </section>

        <main id="main" class="main">
            @yield('contentnews')
        </main>

        <footer id="footer">
            <div class="footer_bottom">
                <p class="copyright">&copy; Copyright <b>Human Resources | PT. Feen Marine</b>. All Rights Reserved <!--<a href="../index.html">FMNews&amp;Info</a>--></p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/slick.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.li-scroller.1.0.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.newsTicker.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
</body>
</html>
