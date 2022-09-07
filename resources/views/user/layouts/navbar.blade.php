@if (\Session::has('email_no_verified'))
    <script>
        alert('Your account is not verified. Please click on verification link on your email to verify your account.');
    </script>
@endif
<header id="header"
        class="fixed-top d-flex align-items-center {{Route::CurrentRouteName()!='w.home'?' header-scrolled other-pages':'header-transparent'}}">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <div class="logo me-auto">
            {{--<h1><a href="{{route('w.home')}}">Girlfriend Vibez</a></h1>--}}
            <a href="{{route('user.home')}}"><img src="{{url('user/logo.png')}}" alt="" class="img-fluid"></a>
            <style>
                #header .logo img{
                    max-height: 70px;
                }
            </style>
        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                @if(auth()->user()->can('profile-complete'))
                    <li>
                        <a class="nav-link scrollto {{(Route::currentRouteName()=='match.show')?'active':''}}"
                           title="match" href="{{route('match.show')}}">
                            <button class="btn btn-light">MATCH</button>
                        </a>
                    </li>
                    <li><a class="nav-link scrollto {{(Route::currentRouteName()=='search.show')?'active':''}}"
                           title="friends" href="{{route('search.show')}}">
                            <button class="btn btn-light">SEARCH</button>
                        </a>
                    </li>
                    <li><a class="nav-link scrollto {{(Route::currentRouteName()=='friend.show')?'active':''}}"
                           title="friends" href="{{route('friend.show')}}">
                            <button class="btn btn-light">FRIENDS</button>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link scrollto {{(Route::currentRouteName()=='user.chat')?'active':''}}"
                           title="chat" href="{{route('user.chat')}}">
                            <button class="btn btn-light">INBOX</button>
                        </a>
                    </li>
                @endif
                <li><a class="nav-link scrollto {{(Route::currentRouteName()=='user.home')?'active':''}}" title="home"
                       href="{{route('user.home')}}"><i class="bi bi-house" style="font-size: 25px"></i></a></li>
                <li><a class="nav-link scrollto {{(Route::currentRouteName()=='user.profile.edit')?'active':''}}"
                       title="Edit Profile" href="{{route('user.profile.edit',[auth()->user()->username])}}">Edit
                        Profile</a></li>
                <li><a class="nav-link scrollto {{(Route::currentRouteName()=='user.profile.view')?'active':''}}"
                       title="View Profile" href="{{route('user.profile.view',[auth()->user()->username])}}"><i
                                class="bi bi-person" style="font-size: 25px"></i></a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <i class="bi bi-bell" title="Notifications" style="font-size: 25px"></i>
                        @if(count(auth()->user()->unreadNotifications)>0)
                            <span class="notification badge">{{count(auth()->user()->unreadNotifications)}}</span>
                        @endif
                    </a>
                    <ul>
                        <li><h5 class="px-2 c-color border-bottom">My Notifications</h5></li>
                        @if(count(auth()->user()->unreadNotifications)>0)

                            @foreach(auth()->user()->unreadNotifications as $notification)
                                <li class="border-bottom li-notification ">
                                    <a data-id="{{$notification->id}}" data-url="{{$notification->data['url']}}"
                                       class="notification-mark-as-read">
                                        <div class="d-flex">
                                            <img src="{{NotificationFrom($notification->id)->details->profile_image()}}"
                                                 width="40" height="40" style="" alt="">
                                            <p class="mt-2">{{$notification->data['msg']}} </p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="border-bottom li-notification">
                                No new notification
                            </li>
                        @endif
                        <div class="dropdown-footer d-flex justify-content-center bg-light">
                            <a href="{{route('notification.show')}}">See all</a>
                        </div>
                    </ul>
                </li>
                @if(auth()->user()->can('profile-complete'))
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            <i class="bi bi-envelope" title="Inbox"
                                                        style="font-size: 25px"></i>
                            @if(count(auth()->user()->myUnreadMessages())>0)
                                <span class="notification badge">{{count(auth()->user()->myUnreadMessages())}}</span>
                            @endif

                        </a>
                        <ul>
                            <li><h5 class="px-2 c-color border-bottom">Recent Messages</h5></li>
                            @if(count(unReadMessages())>0)
                                @foreach(unReadMessages() as $message)
                                    <li class="border-bottom li-notification">
                                        <a href="{{route('user.chat',[$message->from])}}">
                                            <div class="d-flex justify-content-between align-items-center"
                                                 style="width: 100%">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{$message->sender->details->profile_image()}}" width="40"
                                                         height="40" style="" alt="">
                                                    <p><span class="c-color">{{$message->message}}</p>
                                                </div>
                                                <div style="text-align: right">
                                                    <p>{{$message->created_at->diffForHumans(\Carbon\Carbon::now())}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li class="border-bottom li-notification">
                                    No new message
                                </li>
                            @endif
                            <div class="dropdown-footer d-flex justify-content-center bg-light">
                                <a href="{{route('user.chat')}}">See all</a>
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)"><i class="bi bi-person-plus" title="Friend Requests"
                                                        style="font-size: 25px"></i></a>
                        <ul>
                            <li><h5 class="px-2 c-color border-bottom">Friend Requests</h5></li>
                            @if(count(friendRequestsReceived(auth()->user()->id))>0)
                                @foreach(friendRequestsReceived(auth()->user()->id) as $item)
                                    <li class="border-bottom li-notification">
                                        <a href="{{route('user.profile.view',[$item->username])}}">
                                            <div class="d-flex">
                                                <img src="{{$item->details->profile_image()}}"
                                                     width="40" height="40" style="" alt="">
                                                <p><span class="c-color">{{$item->name}}</span></p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li class="border-bottom li-notification">
                                    No new friend request
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="javascript:void(0)"><i class="bi bi-gear" title="Settings" style="font-size: 25px"></i></a>
                    <ul>
                        <li><h5 class="px-2 c-color">My Account</h5></li>
                        <li><a href="{{route('user.profile.edit',[auth()->user()->username])}}">Edit Profile</a></li>
                        <li><a href="{{route('user.profile.photo')}}">Edit My Photo</a></li>
                        <li><a href="{{route('user.location.edit')}}">Edit Location</a></li>
                        <li><a href="{{route('settings.subscription')}}">Subscription</a></li>
                        <li><a href="{{route('settings.account.show')}}">Account Settings</a></li>
                        <li><a href="{{route('settings.block.members.show')}}">Blocked Members</a></li>
                        <li><a href="{{route('settings.email.notification.show')}}">Email Notifications</a></li>
                        <li><a href="{{route('settings.change.password.show')}}">Change password</a></li>
                        <li><a href="{{route('settings.delete.account.show')}}">Delete Account</a></li>
                    </ul>
                </li>
                <li>
                    <a class="btn btn-danger c-bg logout-btn" title="Logout" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right" style="font-size: 25px;margin-right: 5px"></i> Logout
                    </a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>


</header>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<style>
    a.btn.btn-danger.c-bg.logout-btn {
        padding: 10px 20px;
        margin-left: 19px;
        font-weight: bold;
        border-radius: 50px;
    }
    .notification.badge {
        position: absolute;
        right: 0;
        top: 0;
        left: 47px;
        background: #ec6d70;
        padding: 5px 13px 3px 7px;
        border-radius: 50%;
    }
</style>