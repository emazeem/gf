<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Xtreme lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Panel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('admin/assets/images/favicon.png')}}">
    <link href="{{url('admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('admin/dist/css/style.min.css')}}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('admin.layouts.partials.header')
    @include('admin.layouts.partials.sidebar')
    <div class="page-wrapper">
        @yield('content')
        <footer class="footer text-center">
            Copyright@ {{date('Y')}}, Girlfriend Vibez
        </footer>
    </div>
</div>
<script src="{{url('script.js')}}"></script>
<script src="{{url('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


{{--<script src="{{url('admin/dist/js/app-style-switcher.js')}}"></script>
<script src="{{url('admin/dist/js/waves.js')}}"></script>--}}
<script src="{{url('admin/dist/js/sidebarmenu.js')}}"></script>
<script src="{{url('admin/dist/js/custom.js')}}"></script>
</body>
</html>