<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PT. Pelita Nusa Wiratama</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo.jpg') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <!-- modernizr js -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-center">
            <div class="loading-center-absolute">
                <div class="object object_one"></div>
                <div class="object object_two"></div>
                <div class="object object_three"></div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    @include('layout-customers.header')

    @yield('content')

    @include('layout-customers.footer')


    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.3.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- camera slider JS -->
    <script src="{{ asset('assets/js/camera.min.js') }}"></script>

    <!-- jquery.easing js -->
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <!-- slick slider js -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- jquery-ui js -->
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <!-- magnific-popup js -->
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <!-- meanmenu js -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <!-- plugins js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
    
</body>

</html>