@if (\Session::has('email_no_verified'))
    <script>
        alert('Your account is not verified. Please click on verification link on your email to verify your account.');
    </script>
@endif

<header id="header"
        class="fixed-top d-flex align-items-center {{Route::CurrentRouteName()!='w.home'?' header-scrolled other-pages':'header-transparent'}}">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <div class="logo me-auto">

            <a href="{{route('w.home')}}"><img src="{{url('user/logo.png')}}" alt="" class="img-fluid"></a>

        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('w.home')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.about')}}">About us</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.blog')}}">Blog</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.faq')}}">FAQ</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.press')}}">Press</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.contact')}}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        @if(\Illuminate\Support\Facades\Auth::user())
            <a href="{{route('user.welcome')}}" class="book-a-table-btn scrollto">My Account</a>
        @else
            <a href="{{route('login')}}" class="book-a-table-btn scrollto">Login</a>
            <a href="{{route('register')}}" class="book-a-table-btn scrollto">Sign Up</a>
        @endif
    </div>
</header>
<!-- End Header -->