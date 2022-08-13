@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main" style="margin-top: 70px">
        <div class="container">
            <div class="card p-0" style="margin-top: 100px">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link rounded-0 px-5 border" href="{{route('user.profile.edit',[auth()->user()->username])}}"><i class="bi bi-person-rolodex"></i> Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active rounded-0 px-5 border" href="{{route('user.profile.photo')}}"><i class="bi bi-camera"></i>
                                Edit My Photo
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">



                    <h4 class="c-color">
                        You must upload an image of yourself to have success on this site!
                    </h4>
                    <p>                    The chances of you getting messages if you haven't uploaded a photo are extremely low. People like to know who they are talking to when making friends. In order to show up in searches, FriendMatch, etc you have to upload a photo. If you do not do this you are basically not going to be seen on the website and you will get little response.
                    </p>
                    <h5 class="c-color">
                        Choose a Great Head Shot For Your Profile Girlfriend
                    </h5>

                    <p>
                        Upload a picture of you smiling, having fun and choose one that shows a clear head shot to get the best friendship results. This is a female friendship website, so of course nudity and sexually suggestive photos are not allowed.
                    </p>
                    <p>
                        <b>Note:</b> You can only upload photos that are .jpeg, .gif, .png or .jpg and they need to be less than 10MB. Remember it can take a few moments to upload a photos so wait a bit after selecting your file! If you get an error, try a different smaller photo or skip for now and ask for help from a loved one later on.
                    </p>
                    <img src="{{url('user/default_profile.png')}}" alt="" width="300" height="300">
                </div>
                <div class="card-body">
                    <form class="mb-4" action="" method="post">
                        @csrf
                        <label for="profile"><h4 class="c-color">Choose new photo</h4></label>
                        <br>
                        <input type="file" name="profile" id="profile" onchange="">
                        <button type="submit" class="btn c-bg">Apply</button>
                    </form>
                    Don't feel like uploading a picture right now?
                    <h6>
                        Don't feel like uploading a picture? Click here to select one of these default images instead.... But you really should upload a photo of you :)
                    </h6>
                    You really should upload a personal picture of you though. People are generally more comfortable making friends when they can see who they are talking to.
                </div>
            </div>

        </div>
    </main>
    <style>
        .c-select-single li {
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
            border: 2px solid #dedede;
            border-radius: 50px;
        }

        .c-select-single li.active {
            color: #ec6d70;
            border: 2px solid #ec6d70;
        }

    </style>
@endsection