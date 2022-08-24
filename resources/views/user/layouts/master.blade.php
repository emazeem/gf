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
@include('user.layouts.navbar')
<!-- ======= Header ======= -->

<!-- ======= Content Section ======= -->
@yield('content')
<!-- ======= Footer ======= -->
@include('layouts.footer')


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Vendor JS Files -->
<script src="{{url('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('web/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('web/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('web/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('web/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('web/assets/js/main.js')}}"></script>
<script>
    function erroralert(xhr) {
        if (typeof  xhr.responseJSON.errors === 'object') {
            var error = '';
            $.each(xhr.responseJSON.errors, function (key, item) {
                error += item+'\n';
                if ($(document).find('[name="'+key+'"]').length){
                    $(document).find('[name="'+key+'"]').addClass('is-invalid').after('<span class="invalid-feedback is-invalid">'+item+'</span>');
                } else{
                    var split=key.split('.');
                    $(document).find('#'+split[0]+'').addClass('is-invalid').after('<span class="invalid-feedback is-invalid">'+item+'</span>');

                }
            });
            //swal("Failed", error, "error");
        } else {
            alert(xhr.responseJSON.message);
        }
    }
    $('.navbar .dropdown').click(function () {
        $(this).removeClass('dropdown');
        $('.navbar .dropdown').removeClass('show');
        $(this).addClass('dropdown').toggleClass('show');
    })
    $(function () {
       $('.notification-mark-as-read').click(function (e) {
           e.preventDefault();
           var id=$(this).attr('data-id');
           var url=$(this).attr('data-url');
           $.ajax({
               url: "{{route('notification.mark.as.read')}}",
               type: "POST",
               data: {'id': id, _token: '{{csrf_token()}}'},
               dataType: "JSON",
               success: function (data) {
                   window.location.href=url;
               }
           });
       })
        $('.notification-delete').click(function (e) {
           e.preventDefault();
           var id=$(this).attr('data-id');
           $.ajax({
               url: "{{route('notification.delete')}}",
               type: "POST",
               data: {'id': id, _token: '{{csrf_token()}}'},
               dataType: "JSON",
               success: function (data) {
                   location.reload();
               }
           });
       })

    });
</script>

</body>
</html>