<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Girlfriend Vibez | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{url('web/assets/img/favicon.png')}}" rel="icon">
    <link href="{{url('web/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="web/https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('web/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('web/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('web/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('web/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{url('web/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('web/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{url('web/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Delicious - v4.8.0
    * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
@if(Route::CurrentRouteName()=='w.home')
<section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
        <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
        <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
    </div>
</section>
@endif
@include('layouts.navbar')
<!-- ======= Header ======= -->

<!-- ======= Content Section ======= -->
@yield('content')
<!-- ======= Footer ======= -->
@include('layouts.footer')


<!-- Vendor JS Files -->
<script src="{{url('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('web/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('web/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('web/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('web/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('web/assets/js/main.js')}}"></script>

</body>
</html>