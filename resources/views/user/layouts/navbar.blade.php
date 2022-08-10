@if (\Session::has('email_no_verified'))
    <script>
        alert('Your account is not verified. Please click on verification link on your email to verify your account.');
    </script>
@endif

<header id="header"
        class="fixed-top d-flex align-items-center {{Route::CurrentRouteName()!='w.home'?' header-scrolled other-pages':'header-transparent'}}">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <div class="logo me-auto">
            <h1><a href="{{route('w.home')}}">Girlfriend Vibez</a></h1>
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('user.welcome')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{route('user.profile.edit',[auth()->user()->username])}}">Edit Profile</a></li>
                <li><a class="nav-link scrollto" href="{{route('user.profile.view',[auth()->user()->username])}}"><i class="bi bi-person" style="font-size: 25px"></i></a></li>
                <li><a class="nav-link scrollto" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="bi bi-box-arrow-right" style="font-size: 25px"></i></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>


    </div>
</header>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>