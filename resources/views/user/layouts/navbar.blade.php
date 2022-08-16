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
                <li><a class="nav-link scrollto {{(Route::currentRouteName()=='user.welcome')?'active':''}}"
                       title="home" href="{{route('user.welcome')}}"><i class="bi bi-house" style="font-size: 25px"></i></a>
                </li>
                <li><a class="nav-link scrollto {{(Route::currentRouteName()=='user.profile.edit')?'active':''}}"
                       title="Edit Profile" href="{{route('user.profile.edit',[auth()->user()->username])}}">Edit
                        Profile</a></li>
                <li><a class="nav-link scrollto {{(Route::currentRouteName()=='user.profile.view')?'active':''}}"
                       title="View Profile" href="{{route('user.profile.view',[auth()->user()->username])}}"><i
                                class="bi bi-person" style="font-size: 25px"></i></a></li>

                <li class="dropdown">
                    <a href="javascript:void(0)"><i class="bi bi-bell" title="Notifications" style="font-size: 25px"></i></a>
                    <ul>
                        <li><h5 class="px-2 c-color border-bottom">My Notifications</h5></li>
                        <li class="border-bottom li-notification"><a href="#">
                            <div class="d-flex">
                                <img  src="{{auth()->user()->details->profile_image()}}"
                                     width="40" height="40" style="" alt="">
                                <p ><span class="c-color">Hi !</span> How are you? </p>
                            </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)"><i class="bi bi-envelope" title="Inbox" style="font-size: 25px"></i></a>
                    <ul>
                        <li><h5 class="px-2 c-color border-bottom">Recent Messages</h5></li>
                        <li class="border-bottom li-notification"><a href="#">
                            <div class="d-flex">
                                <img  src="{{auth()->user()->details->profile_image()}}"
                                     width="40" height="40" style="" alt="">
                                <p ><span class="c-color">Hi !</span> How are you? </p>
                            </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)"><i class="bi bi-person-plus" title="Friend Requests" style="font-size: 25px"></i></a>
                    <ul>
                        <li><h5 class="px-2 c-color border-bottom">Friend Requests</h5></li>
                        <li class="border-bottom li-notification"><a href="#">
                            <div class="d-flex">
                                <img  src="{{auth()->user()->details->profile_image()}}"
                                     width="40" height="40" style="" alt="">
                                <p ><span class="c-color">Hi !</span> How are you? </p>
                            </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)"><i class="bi bi-gear" title="Settings" style="font-size: 25px"></i></a>
                    <ul>
                        <li><h5 class="px-2 c-color">My Account</h5></li>
                        <li><a href="{{route('user.profile.edit',[auth()->user()->username])}}">Edit Profile</a></li>
                        <li><a href="{{route('user.profile.photo')}}">Edit My Photo</a></li>
                        <li><a href="{{route('user.location.edit')}}">Edit Location</a></li>
                        <li><a href="#">Subscription</a></li>
                        <li><a href="{{route('settings.account.show')}}">Account Settings</a></li>
                        <li><a href="#">Blocked Members</a></li>
                        <li><a href="#">Email Notifications</a></li>
                        <li><a href="{{route('settings.change.password.show')}}">Change password</a></li>
                        <li><a href="#">Delete Account</a></li>
                    </ul>
                </li>

                <li><a class="nav-link scrollto" title="Logout" href="{{ route('logout') }}"
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