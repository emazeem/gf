@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <main id="main" style="margin-top: 70px">
        <div class="container">
            <div class="card p-0" style="margin-top: 100px">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active rounded-0 px-5 border" href="#"><i class="bi bi-person-rolodex"></i> Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0 px-5 border" href="#"><i class="bi bi-camera"></i> Edit My Photo</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h4>
                        Looks Like You Need To Complete Your Profile Girlfriend
                    </h4>
                    <h5>
                        It is only 7 % complete
                    </h5>
                    <h6>
                        Before you can use Girlfriend Social to meet new friends we need to find out more about you!
                    </h6>
                    <p>
                        Please use this section to complete your profile and you will then be able to gain access to the website! Detailed, positive, fun and complete profiles will get you the best results.
                    </p>
                    <p>
                        There are 25 questions. There is always a do not wish to share option. Grab a coffee or a glass of wine and take a few moments for *you* and do this part right. We want members who take friendship searching serious, so you will not be able to access the rest of the website until you completely fill out your profile out Girlfriend!
                    </p>
                    <h6>
                        Try following along the 4 steps below or try filling out : A Profile Photo as the next step in completing your profile to 100%
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link border rounded-0 active" id="pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true">Basic Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-personal-tab" data-toggle="pill" href="#pills-personal" role="tab" aria-controls="pills-personal" aria-selected="false">Personal Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">About Me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border rounded-0" id="pills-interests-tab" data-toggle="pill" href="#pills-interests" role="tab" aria-controls="pills-interests" aria-selected="false">Interests</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">


                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="headline" class="h4  c-h">Headline</label>
                                    <label for="headline">Enter a short headline about you. Example - Single Mom Looking to get out and Dance! Reminder - GFS is for Women friendship purposes only. Any accounts with inappropriate, selling or sexual themes will be removed.</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="headline" id="headline" data-rule="headline">
                                    </div>
                                    @error('headline')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="about_me" class="h4  c-h">About Me</label>
                                    <label for="about_me">This is the main section of your friendship profile. Go into detail about who you are and what you are looking for in friends. You can type A LOT in this box - so get to it! Example: I love my job downtown, just moved here, have 2 cats and no kids! Let'</label>
                                    <textarea class="form-control" name="about_me" rows="10" id="about_me" data-rule="about_me">
                                    </textarea>

                                    @error('about_me')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="gender" class="h4 c-h">Gender</label><br>
                                    <label for="gender">This site is for *WOMEN ONLY*</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="gender" id="gender" data-rule="gender">
                                            <option selected hidden>(Select an option)</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    @error('headline')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <label for="gender" class="h4 c-h">Gender</label><br>
                                    <label for="gender">This site is for *WOMEN ONLY*</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="gender" id="gender" data-rule="gender">
                                            <option selected hidden>(Select an option)</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    @error('headline')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">...</div>
                        <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">...</div>
                        <div class="tab-pane fade" id="pills-interests" role="tabpanel" aria-labelledby="pills-interests-tab">...</div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <style>
        .menu #menu-flters li {
            cursor: pointer;
            display: inline-block;
            padding: 8px 16px 10px 16px;
            font-size: 14px;
            font-weight: 500;
            line-height: 1;
            color: #444444;
            margin: 0 3px 10px 3px;
            transition: all ease-in-out 0.3s;
            background: #fff;
            border: 2px solid #ffb03b;
            border-radius: 50px;
        }
    </style>
@endsection