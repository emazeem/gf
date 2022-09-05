@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main" style="margin-top: 70px">
        <div class="container">
            <div class="card p-0" style="margin-top: 100px">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link rounded-0 px-5 border"
                               href="{{route('user.profile.edit',[auth()->user()->username])}}"><i
                                        class="bi bi-person-rolodex"></i> Edit Profile</a>
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
                    <p> The chances of you getting messages if you haven't uploaded a photo are extremely low. People
                        like to know who they are talking to when making friends. In order to show up in searches,
                        FriendMatch, etc you have to upload a photo. If you do not do this you are basically not going
                        to be seen on the website and you will get little response.
                    </p>
                    <h5 class="c-color">
                        Choose a Great Head Shot For Your Profile Girlfriend
                    </h5>

                    <p>
                        Upload a picture of you smiling, having fun and choose one that shows a clear head shot to get
                        the best friendship results. This is a female friendship website, so of course nudity and
                        sexually suggestive photos are not allowed.
                    </p>
                    <p>
                        <b>Note:</b> You can only upload photos that are .jpeg, .gif, .png or .jpg and they need to be
                        less than 10MB. Remember it can take a few moments to upload a photos so wait a bit after
                        selecting your file! If you get an error, try a different smaller photo or skip for now and ask
                        for help from a loved one later on.
                    </p>
                    <img src="{{auth()->user()->details->profile_image()}}" alt="" width="300" height="300"
                         id="user-image" style="object-fit: cover" class="profile-picture">
                    <div class="alert alert-success alert-dismissible fade show justify-content-between" role="alert"
                         style="display: none;">
                        <strong>Success!</strong> <span class="message"></span>
                        <span onclick="$('.alert').css('display','none')"><i class="bi bi-x-circle"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="profile_form" class="mb-4">
                        @csrf
                        <label for="profile"><h4 class="c-color">Choose new photo</h4></label>
                        <br>
                        <input type="file" name="profile" id="profile"
                               onchange="document.getElementById('user-image').src = window.URL.createObjectURL(this.files[0]);"
                        >
                        <button type="submit" class="btn c-bg">Apply</button>
                    </form>

                    Don't feel like uploading a picture right now?
                    <h6 data-toggle="modal" data-target=".bd-example-modal-lg">
                        Don't feel like uploading a picture? Click here to select one of these default images
                        instead.... But you really should upload a photo of you :)
                    </h6>
                    You really should upload a personal picture of you though. People are generally more comfortable
                    making friends when they can see who they are talking to.
                </div>
            </div>

        </div>
    </main>
    <script>
        $(document).on('submit', '#profile_form', function (e) {
            e.preventDefault();
            var alert=$('.alert');
            alert.hide();
            $.ajax({
                type: "POST",
                url: "{{route('user.profile')}}",
                data: new FormData(this),
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    alert.find('.message').html("Profile picture is updated successfully!");
                    alert.css('display','flex');
                },
                error: function (xhr) {
                    erroralert(xhr);
                }
            });

        });
        $(document).on('submit', '.predefine-image', function (e) {
            e.preventDefault();
            var alert=$('.alert');
            alert.hide();
            $.ajax({
                type: "POST",
                url: "{{route('user.pre.profile')}}",
                data: new FormData(this),
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    $('.modal-close-btn').click();
                    $('.profile-picture').attr('src',data.profile);
                    alert.find('.message').html("Profile picture is updated successfully!");
                    alert.css('display','flex');
                },
                error: function (xhr) {
                    erroralert(xhr);
                }
            });

        });

    </script>

    <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose a picture to set as your profile</h5>
                    <button type="button" class="close modal-close-btn btn" data-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    @foreach($images as $k=>$image)
                        <div class="col-md-4">
                            <form class="predefine-image" id="profileForm{{$k}}">
                                @csrf
                                <input type="hidden"  name="image" value="{{$image['name']}}">
                            </form>
                            <img src="{{url('user/defprofile/'.$image['name'])}}" alt="" class="img-thumbnail" onclick="$('#profileForm{{$k}}').submit()">
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection