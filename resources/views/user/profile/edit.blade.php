@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <main id="main" style="margin-top: 70px">
        <div class="container">
            <div class="card p-0" style="margin-top: 100px">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active rounded-0 px-5 border" href="{{route('user.profile.edit',[auth()->user()->username])}}"><i class="bi bi-person-rolodex"></i> Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0 px-5 border" href="{{route('user.profile.photo')}}"><i class="bi bi-camera"></i>
                                Edit My Photo
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h4 class="c-color">
                        Looks Like You Need To Complete Your Profile Girlfriend
                    </h4>
                    <h5>
                        It is only 7 % complete
                    </h5>
                    <h6>
                        Before you can use Girlfriend Social to meet new friends we need to find out more about you!
                    </h6>
                    <p>
                        Please use this section to complete your profile and you will then be able to gain access to the
                        website! Detailed, positive, fun and complete profiles will get you the best results.
                    </p>
                    <p>
                        There are 25 questions. There is always a do not wish to share option. Grab a coffee or a glass
                        of wine and take a few moments for *you* and do this part right. We want members who take
                        friendship searching serious, so you will not be able to access the rest of the website until
                        you completely fill out your profile out Girlfriend!
                    </p>
                    <h6>
                        Try following along the 4 steps below or try filling out : A Profile Photo as the next step in
                        completing your profile to 100%
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link border rounded-0 active" id="pills-basic-tab" data-toggle="pill"
                               href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true">Basic
                                Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-personal-tab" data-toggle="pill"
                               href="#pills-personal" role="tab" aria-controls="pills-personal" aria-selected="false">Personal
                                Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-about-tab" data-toggle="pill"
                               href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">About
                                Me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-interests-tab" data-toggle="pill"
                               href="#pills-interests" role="tab" aria-controls="pills-interests" aria-selected="false">Interests</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-basic" role="tabpanel"
                             aria-labelledby="pills-basic-tab">
                            @include('user.profile.components.basic_html')
                        </div>
                        <div class="tab-pane fade" id="pills-personal" role="tabpanel"
                             aria-labelledby="pills-personal-tab">
                            @include('user.profile.components.personal_html')

                        </div>
                        <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                            @include('user.profile.components.about_me_html')

                        </div>
                        <div class="tab-pane fade" id="pills-interests" role="tabpanel"
                             aria-labelledby="pills-interests-tab">
                            @include('user.profile.components.interests_html')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection