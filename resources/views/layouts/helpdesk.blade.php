<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(isset($title))
            {{ $title }} | Helpdesk
        @else
            HRISPA | Human Resources Information System Personnel Admin
        @endif
    </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/stylehelpdesk.css')}}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" >
</head>
<body>
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top"> --}}
    <nav class="navbar navbar-expand-md shadow-sm fixed-top">
        <p class="navbar-brand mx-auto helpdesk">
            <img src="{{ asset('img/1.png')}}" alt="Logo"  class="d-inline-block"> | Helpdesk
        </p>
    </nav>

    <div class="container mt-10">
        @yield('contenthelp')
    </div>

    <footer class="footer mt-auto">
        <div class="copyright">
            Copyright &copy; Developer | UserUnknown
        </div>
    </footer>
</body>
</html>
