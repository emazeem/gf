<header id="header" class="fixed-top d-flex align-items-center {{Route::CurrentRouteName()!='w.home'?' header-scrolled other-pages':'header-transparent'}}">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <div class="logo me-auto">
            <h1><a href="{{route('w.home')}}">Girlfriend Vibez</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('w.home')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.about')}}">About us</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.blog')}}">Blog</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.faq')}}">FAQ</a></li>
                <li><a class="nav-link scrollto" href="{{route('w.press')}}">Press</a></li>
{{--                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>--}}
                <li><a class="nav-link scrollto" href="{{route('w.contact')}}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{route('login')}}" class="book-a-table-btn scrollto">Login</a>
        <a href="{{route('register')}}" class="book-a-table-btn scrollto">Sign Up</a>

    </div>
</header>
<!-- End Header -->