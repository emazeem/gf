@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img style="width: 70%;" src="{{auth()->user()->details->profile_image()}}" alt="" class="img-fluid rounded-3">
                        </div>
                        <div class="card-footer">
                            <center>
                                <h4 class="mt-2">Hi {{auth()->user()->username}}!</h4>
                            </center>
                        </div>
                        <div class="card-footer">

                        <ul style="list-style-type: none;">
                                <li><a href="{{route('user.profile.view',[auth()->user()->username])}}"><i class="bi bi-bell"></i> View My Recent Updates</a></li>
                                <li><a href="{{route('user.profile.view',[auth()->user()->username])}}"><i class="bi bi-card-list"></i> View My Profile</a></li>
                                <li><a href="{{route('user.profile.photo')}}"><i class="bi bi-camera"></i> Edit My Photo</a></li>
                                <li><a href="{{route('user.profile.edit',[auth()->user()->username])}}"><i class="bi bi-pencil"></i> Edit My Profile</a></li>
                                <li><a href="{{route('user.location.edit')}}"><i class="bi bi-pin-map"></i> Edit My Location</a></li>
                                <li><a href="{{route('friend.show')}}"><i class="bi bi-pin-map"></i> Browse Members</a></li>
                                <li><a href="{{route('user.invite')}}"><i class="bi bi-share"></i> Invite Your Friends</a></li>
                                <li><a href="{{route('user.birthdays')}}"><i class="bi bi-calendar-date"></i> Birthdays</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="card mt-3">
                        <div class="card-header c-color">
                            Upgrade Today
                        </div>
                        <div class="card-header">
                            <ul style="list-style-type: none;">
                                <li><i class="bi bi-star-fill"></i>Show up first in match</li>
                                <li><i class="bi bi-star-fill"></i>Remove All Ads</li>
                                <li><i class="bi bi-star-fill"></i>See Members Last Logged In Date</li>
                                <li><i class="bi bi-star-fill"></i>Support The Site and So Much More!</li>
                            </ul>
                            <center><a href="{{route('settings.subscription')}}" class="btn btn-danger btn-sm c-bg">UPGRADE</a></center>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header c-color">
                            Requests
                        </div>
                        <div class="card-header">
                            <ul style="list-style-type: none;">
                                @foreach(friendRequestsReceived(auth()->user()->id) as $item)
                                    <li>
                                        <a href="{{route('user.profile.other',[$item->username])}}" class="d-flex align-items-center justify-content-around">
                                            <div>
                                                <img src="{{$item->details->profile_image()}}" alt="" width="40"> {{$item->name}}
                                            </div>
                                            <div>

                                                <i data-id="{{$item->id}}" class="friend-request-sent approve bi bi-check "></i>
                                                <i data-id="{{$item->id}}" class="friend-request-sent decline bi bi-x"></i>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header c-color">
                            Newest GFV Members
                        </div>
                        <div class="card-header">
                            <div class="d-flex friends-div">
                                <style>
                                    .friends-div {
                                        display: flex!important;
                                        flex-wrap: wrap;
                                        justify-content: space-between;
                                    }
                                    .friends-div img{
                                        width: 50px;
                                        margin-top: 3px;
                                    }
                                </style>
                                @for($i=0;$i<=21;$i++)
                                @endfor
                                @foreach($users as $user)
                                    <img src="{{$user->details->profile_image()}}" title="{{$user->name}}"  onclick="window.location.href='{{route('user.profile.other',[$user->username])}}'" alt="" class="img-fluid rounded-3">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header c-color" style="cursor: pointer" onclick="window.location.href='{{route('w.faq')}}'">
                            NEW HERE?<br>
                            FEELING CONFUSED?<br>
                            CLICK HERE FOR HELP?<br>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header c-color" style="cursor: pointer" onclick="window.location.href='{{route('w.blog')}}'">
                            TIPS FOR MAKING FEMALE FRIENDS?<br>
                            Click to find what a write to new friends about!
                        </div>
                    </div>


                </div>
                <div class="col-md-9">
                    <div class="card p-3">
                        <h4>New Friendship Matches</h4>
                        When you match with someone they will show up here - Click here to Match with Local Ladies!


                        @foreach(getMutualMatch() as $user)
                            <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12" onclick="window.location.href='{{route('user.profile.other',[$user->username])}}'">
                                <img src="{{$user->details->profile_image()}}" alt="" class="img-fluid rounded-3 gf-members-thumbnail">
                                <p><i class="bi bi-calendar-date"></i> {{getUserAge($user->id)}} Years Old</p>
                            </div>
                        @endforeach

                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Some GFV Members In Your Area...</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($users as $user)
                                    <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12" onclick="window.location.href='{{route('user.profile.other',[$user->username])}}'">
                                        <img src="{{$user->details->profile_image()}}" alt="" class="img-fluid rounded-3 gf-members-thumbnail">
                                        <p><i class="bi bi-calendar-date"></i> {{getUserAge($user->id)}} Years Old</p>
                                    </div>
                                @endforeach
                            </div>
                            <p>
                                In order to meet new friends you need to reach out!<br>
                                Why not Send a message to a local lady shown here? Take a chance, Say hi and meet a new friend!
                            </p>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4>Check out what Girlfriend Social Members are saying....</h4>
                        </div>
                        <div class="card-body">
                            @if(count($testimonials)>0)
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    @foreach($testimonials as $k=>$testimonial)
                                    <div class="carousel-item {{$k==0?'active':''}} text-center">
                                        <img src="{{$testimonial->profile()}}" width="100" height="100" style="border-radius: 50%;border: 4px solid #ec6d70">

                                        <h3>{{$testimonial->name}}</h3>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        </div>
                                        <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            {{$testimonial->feedback}}
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                    </div>
                                    @endforeach

                                </div>
                                <a class="carousel-control-prev text-danger h2" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                                <a class="carousel-control-next text-danger h2" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                            @else
                                <i class="text-muted">
                                    No testimonials
                                </i>
                            @endif
                        </div>
                        <div class="card-footer">
                            <a href="{{route('w.testimonial')}}">Click here to read even more Girlfriend Social Reviews ...</a>
                            <p>
                                Want to win a Lifetime Gold Membership? Submit your Girlfriend Social review and we pick a winner each month!
                            </p>
                        </div>
                        <div class="card-footer">
                            @foreach($blogs as $blog)
                            @endforeach
                                <p>Want to write for us?</p>
                                <a href="{{route('w.contact')}}">Contact us</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(function () {
            $(document).on('click', '.friend-request-sent', function () {
                var id = $(this).attr('data-id');
                var status = null;
                if ($(this).hasClass('approve')) {
                    status = '{{Friends::STATUS_APPROVED}}'
                }
                if ($(this).hasClass('decline')) {
                    status = '{{Friends::STATUS_REJECTED}}'
                }
                var button = $(this), previous =$(this).html();
                button.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing ...');

                $.ajax({
                    type: "POST",
                    url: "{{route('friend.request.action')}}",
                    dataType: "JSON",
                    data: {'id': id, 'status': status, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        location.reload();
                    },
                    error: function (xhr) {
                        button.attr('disabled', null).html(previous);
                        erroralert(xhr);
                    }
                });
            });
        });
    </script>
@endsection