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
                            <a class="nav-link rounded-0 px-5 border" href="{{route('user.profile.photo')}}"><i class="bi bi-camera"></i>
                                Edit My Photo
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{auth()->user()->details->profile_image()}}" alt="" width="100" height="100"
                             id="user-image" style="object-fit: cover" class="profile-picture">
                        <h4 class="p-md-3 p-0 c-color">{{auth()->user()->username}}!</h4>
                    </div>
                    <h6>We are matching you with ladies near :</h6>
                    <p>{{auth()->user()->details->location}}</p>
                    <h6 class="c-color">Edit or Update Your Location?</h6>
                    If you are not getting the correct search results on the site, please try updating your address here. Click Edit Location and enter your address.
                    Use your street address and zip/postal code and make sure to choose the correct selection from the drop down box to make sure you get the best and closest matches to you.
                    <br>
                    If you continue to get wrong results, try a major intersection that is near you instead. We use Google Maps for targeting and sometimes the results are not correct.
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            Location:<br>
                            {{auth()->user()->details->location}}
                        </div>
                        <h6 data-toggle="modal" data-target=".bd-example-modal-lg">
                            Edit Location
                        </h6>
                    </div>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection