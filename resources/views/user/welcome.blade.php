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
                                <li><a href="{{route('user.profile.view',[auth()->user()->username])}}"><i class="bi bi-card-list"></i> View My Profile</a></li>
                                <li><a href="{{route('user.profile.photo')}}"><i class="bi bi-camera"></i> Edit My Photo</a></li>
                                <li><a href="{{route('user.profile.edit',[auth()->user()->username])}}"><i class="bi bi-pencil"></i> Edit My Profile</a></li>
                                <li><a href="{{route('user.location.edit')}}"><i class="bi bi-pin-map"></i> Edit My Location</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mt-3">
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
                                    <img src="{{url('user/default_profile.png')}}" alt="" class="img-fluid rounded-3">
                                @endfor
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://www.girlfriendsocial.com/images/tellus.png" alt="" class="img-fluid" width="150">
                            </div>
                            <div class="col-md-10">
                                <h4>Welcome to Girlfriend Social!</h4>
                                We are so glad you could join us! Let's get started on making you some new friends...
                                <br>
                                Looks like your are new around here Girlfriend... or Maybe you haven't logged in lately?
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Finish Your GFS Profile</h4>
                        </div>
                        <div class="card-body">
                            We need you complete your profile!




                            <div class="p-5">
                                Your Profile is {{auth()->user()->profileCompletePercentage()}}% Complete
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"  style="width: {{auth()->user()->profileCompletePercentage()}}%" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <a href="{{route('user.profile.edit',[auth()->user()->username])}}">Click here to finish updating your details now. Your next step is to update {{auth()->user()->nextActionOfProfileCompletion()}}</a>

                            </div>
                            Please finish your profile and you will then be able to gain full access to the website, and start making friends. Detailed, fun and complete profiles will get you the best results.



                        </div>
                        <div class="card-footer">
                            <h4>Why do we ask for all this?</h4>
                            Girlfriend social is about creating real, meaningful, friendships. It only takes a few moments for you to fill out a profile with your location, interests and other information about the friendships you are looking for. Not having a complete profile makes it harder to find friends to match and connect with because they won't know what to talk with you about. We also find scammers, men, and others here to waste your time, don't take this part seriously and are easier to spot, report and remove. Take some time for you (Only 5 - 15 minutes or so), pour a cup of coffee, wine or water and do this part right!
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4>My Settings</h4>
                        </div>
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Subscription</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Account Settings</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Blocked Numbers</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Email Notifications</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Change Password</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Delete Account</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection