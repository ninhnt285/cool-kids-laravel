<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Be Stronger') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/material/material-dashboard.min.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('css/material/material-dashboard-pro.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="">
    <div class="wrapper ">
        @include('includes/sidebar')

        <div class="main-panel">
            @include('includes/navbar')

            <div class="content">
                @yield('content')
            </div>

            @include('includes/footer')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/material/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chartist JS -->
    <script src="{{ asset('js/material/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/material/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material/plugins/bootstrap-selectpicker.js') }}"></script>
    @yield('js-embed')
    <script src="{{ asset('js/material/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>
</body>
</html>
