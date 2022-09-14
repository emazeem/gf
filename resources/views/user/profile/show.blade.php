@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <main id="main" style="margin-top: 70px">
        <div class="cover-photo" style="background-image: url('{{$user->details->cover_image()}}');">
            <div id="uploading">
                <h4>Uploading <i class="spinner-border"></i></h4>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-lg dropdown-toggle bg-white" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <i class="bi bi-camera"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" onclick="changeCoverPhoto()"><i class="bi bi-camera"></i>
                        <small>Change Cover Photo</small>
                    </a>
                    <a class="dropdown-item" onclick="changeProfilePhoto()"><i class="bi bi-camera"></i>
                        <small>Change Profile Photo</small>
                    </a>
                    <a class="dropdown-item" onclick="$('#remove-cover-photo').submit()"><i class="bi bi-trash"></i>
                        <small>Delete Cover Photo</small>
                    </a>
                    <form id="remove-cover-photo" action="{{route('user.cover.photo.delete')}}" method="post">
                        @csrf
                    </form>
                </div>
                <form id="profile_form">
                    @csrf
                    <input type="file" name="profile" id="profile" style="visibility: hidden">
                </form>
                <form id="cover_form">
                    @csrf
                    <input type="file" name="cover" id="cover" style="visibility: hidden">
                </form>

            </div>
        </div>
        <div class="profile-pic text-center">
            <img class="profile-picture" src="{{$user->details->profile_image()}}" alt="profile-picture">
        </div>
        <div class="container mt-4">
            <div class="row">
                @can('if-user-upgraded')
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="c-color">Additional VIP Photos</h4>
                            </div>
                            <div class="card-body">
                                @foreach(auth()->user()->album as $album)
                                    <div class="col-md-3 border rounded-3 p-2">
                                        <div>
                                            <center>
                                                <img src="{{Storage::disk('local')->url('/album/'.$album->image)}}"
                                                     class="img-fluid" style="height: 150px" alt="">
                                            </center>
                                        </div>
                                        <div>
                                            <h5>
                                                {{$album->title}}
                                            </h5>
                                            <p class="text-sm text-muted">
                                                {{$album->created_at->format('d F,y h:i A')}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="card-footer">
                                <a href="{{route('user.album.manage')}}">Edit or Add Photos to Your Profile Here.</a>
                            </div>
                        </div>
                    </div>
                @endcan
                <div class="col-md-9 col-12">
                    <div class="card">
                        <div class="card-body">
                            <b>About Me -</b> {{$user->details->about_me}}
                            <br>
                            <?php
                            if ($user->details->dob) {
                                $fdate = $user->details->dob;
                                $tdate = date('Y-m-d');
                                $datetime1 = strtotime($fdate); // convert to timestamps
                                $datetime2 = strtotime($tdate); // convert to timestamps
                                $days = (int)(($datetime2 - $datetime1) / 86400 / 365);
                            } else {
                                $days = null;
                            }
                            ?>
                            <b>Quick Stats -</b> {{$days}}, , live in {{$user->details->location}}
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4>Hobbies</h4>
                        </div>
                        <div class="card-body">
                            <h3>My Hobbies</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->hobbies) as $hobby)
                                    @if($hobby)
                                        <li class="active">
                                            <?php
                                                $image=strtolower($hobby);
                                                $image=str_replace('/','',$image);
                                                $image=str_replace('  ',' ',$image);
                                            ?>
                                            <img src="{{url('icons/'.$image.'.png')}}" title="{{$image}}" width="30px" alt="">
                                                {{$hobby}}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <h3>Sports</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->sports) as $hobby)
                                    @if($hobby)
                                        <li class="active">
                                            <?php
                                            $image=strtolower($hobby);
                                            $image=str_replace('/','',$image);
                                            $image=str_replace('  ',' ',$image);
                                            ?>
                                            <img src="{{url('icons/'.$image.'.png')}}" title="{{$image}}" width="30px" alt="">

                                            {{$hobby}}</li>@endif
                                @endforeach
                            </ul>
                            <h3>Fitness/Outdoors</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->fitness) as $hobby)
                                    @if($hobby)
                                        <li class="active">
                                            <?php
                                            $image=strtolower($hobby);
                                            $image=str_replace('/','',$image);
                                            $image=str_replace('  ',' ',$image);
                                            ?>
                                            <img src="{{url('icons/'.$image.'.png')}}" title="{{$image}}" width="30px" alt="">

                                            {{$hobby}}</li>@endif
                                @endforeach
                            </ul>
                            <h3>Entertainment / Going Out</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->entertainment) as $hobby)
                                    @if($hobby)
                                        <li class="active">
                                            <?php
                                            $image=strtolower($hobby);
                                            $image=str_replace('/','',$image);
                                            $image=str_replace('  ',' ',$image);
                                            ?>
                                            <img src="{{url('icons/'.$image.'.png')}}" title="{{$image}}" width="30px" alt="">
                                            {{$hobby}}</li>@endif
                                @endforeach
                            </ul>
                            <h3>Movies</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->movies) as $hobby)
                                    @if($hobby)
                                        <li class="active">
                                            <?php
                                            $image=strtolower($hobby);
                                            $image=str_replace('/','',$image);
                                            $image=str_replace('  ',' ',$image);
                                            ?>
                                            <img src="{{url('icons/'.$image.'.png')}}" title="{{$image}}" width="30px" alt="">
                                            {{$hobby}}</li>
                                    @endif
                                @endforeach
                            </ul>

                            <h3>Music</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->music) as $hobby)
                                    @if($hobby)
                                        <li class="active">

                                            <?php
                                            $image=strtolower($hobby);
                                            $image=str_replace('/','',$image);
                                            $image=str_replace('  ',' ',$image);
                                            ?>
                                            <img src="{{url('icons/'.$image.'.png')}}" title="{{$image}}" width="30px" alt="">
                                            {{$hobby}}</li>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-12">


                    <div class="card mb-3">
                        <div class="card-header">
                            <h4>{{$user->username}}</h4>
                        </div>
                        <div class="card-body">
                            <p class="m-0"><b>Lives in :</b> {{$user->details->location}}</p>
                            <p class="m-0"><b>Joined GFV :</b> {{$user->details->why_you_are_on_gfv}}</p>
                            <p class="m-0"><b>Personality : </b> {{$user->details->personality_type}}</p>
                            <p class="m-0"><b>Communicate : </b> {{$user->details->communication_style}}</p>
                        </div>
                    </div>


                    <div class="card d-none">
                        <div class="card-header">
                            <h4>Availability</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered availability-table" style="font-size: 9px">
                                <thead>
                                <tr class="text-center">
                                    <th colspan="8">Availability</th>
                                </tr>
                                @php $availability=explode('@@@',$user->details->availability); @endphp
                                <tr>
                                    <th></th>
                                    <th>Su</th>
                                    <th>M</th>
                                    <th>T</th>
                                    <th>W</th>
                                    <th>T</th>
                                    <th>F</th>
                                    <th>S</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Morn</th>
                                    <td class="{{in_array('Monday Morning',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Tuesday Morning',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Wednesday Morning',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Thursday Morning',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Friday Morning',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Saturday Morning',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Sunday Morning',$availability)?'c-bg':''}}"></td>
                                </tr>
                                <tr>
                                    <th>After</th>
                                    <td class="{{in_array('Monday After',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Tuesday After',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Wednesday After',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Thursday After',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Friday After',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Saturday After',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Sunday After',$availability)?'c-bg':''}}"></td>
                                </tr>
                                <tr>
                                    <th>Night</th>
                                    <td class="{{in_array('Monday Night',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Tuesday Night',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Wednesday Night',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Thursday Night',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Friday Night',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Saturday Night',$availability)?'c-bg':''}}"></td>
                                    <td class="{{in_array('Sunday Night',$availability)?'c-bg':''}}"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <ul style="list-style-type: none">
                                <li>
                                    <a href="{{route('user.profile.edit',[auth()->user()->username])}}"><i
                                                class="bi bi-pencil"></i> Edit my Profile</a>
                                </li>
                                <li>
                                    <a href="{{route('user.location.edit')}}"><i class="bi bi-pin-map"></i> Edit
                                        Location</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <style>
        .cover-photo {
            height: 300px;
            background-position: center;
            z-index: -100;
            background-size: cover;
        }

        .profile-picture {
            border-radius: 50%;
            height: 150px;
            width: 150px;
            margin-top: -75px;
        }

        td.c-bg {
            background-color: #ec6d70;
        }
    </style>
    <script>
        function changeProfilePhoto() {
            $('#profile').click();
        }

        function changeCoverPhoto() {
            $('#cover').click();
        }

        $(function () {
            $(document).on('change', '#profile', function (e) {
                $('#profile_form').submit();
                $('#profile').val('');
            });
/*            $(document).on('change', '#cover', function (e) {
                $('#cover_form').submit();
                $('#cover').val('');
            });*/

            $(document).on('submit', '#profile_form', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{route('user.profile')}}",
                    data: new FormData(this),
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        $('.profile-picture').attr('src', data.profile);
                    },
                    error: function (xhr) {
                        erroralert(xhr);
                    }
                });
            });
/*            $(document).on('submit', '#cover_form', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{route('user.cover')}}",
                    data: new FormData(this),
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        $('.cover-photo').css('background-image', 'url(' + data.profile + ')');
                    },
                    error: function (xhr) {
                        erroralert(xhr);
                    }
                });
            });*/

            $(document).on('click', '.report-user', function (e) {
                alert(1);
                e.preventDefault();
                alert(1);
                var id = $(this).attr('data-id');
                $('#abuse_to').val(id);
                $('#abuse_modal').modal('show');
            })
        });
    </script>
    <div class="modal fade" id="abuse-modal" tabindex="-1" role="dialog"
         aria-labelledby="update-social-info-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="update-social-info-modalLabel"><i class="bi bi-flag"></i>Report Abuse
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="social_info_form">
                    @csrf
                    <input type="text" name="id" id="abuse_to">
                    <h6>We take all abuse reports seriously! The user will never know you reported them.</h6>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type">Type of Abuse</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="" hidden>(select)</option>
                                        <option value="Man">Male User</option>
                                        <option value="Spam">Spam / Scam / Asking for Money</option>
                                        <option value="Abuse">Abuse / Harassment</option>
                                        <option value="Inappropriate">Inappropriate Content / Pictures</option>
                                        <option value="Licensed">Licensed Material</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control"
                                           value=""
                                           name="description" id="description">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer share-post-button">
                        <button type="button" data-dismiss="modal">Close</button>
                        <button type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
        .modal-lg{
            max-width: 1000px !important;
        }
    </style>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop Cover Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Upload</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", "#cover", function(e){
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: false,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                minWidth: 256,
                minHeight: 256,
                maxWidth: 4096,
                maxHeight: 4096,
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('user.cover')}}",
                        data: {'_token':'{{csrf_token()}}', 'image': base64data},
                        success: function(data){
                            $modal.modal('hide');
                            $('.cover-photo').css('background-image', 'url(' + data.cover + ')');
                        },
                        beforeSend: function () {
                            $('#crop').html('Processing ... ');
                            $('.cover-photo').addClass('.edit-overlay');
                        },
                        complete: function () {
                            $('#cover').val('');
                            $('#crop').html('Upload');
                            $('.cover-photo').removeClass('.edit-overlay');
                        },
                    });
                }
            });
        })
    </script>
    <style>
        .cover-photo #uploading{
            display: none;
        }
        .edit-overlay{
            position: relative;
        }
        .cover-photo.edit-overlay #uploading{
            display: block;
            position: absolute;
            width: 100%;
            height: 300px;
            background-color: rgba(255, 255, 255, 0.38);
        }
        .cover-photo.edit-overlay #uploading h4{
            position: absolute;
            left: calc( 50% - 50px );
            color: black;
            top: calc( 50% - 25px );
            font-size: 44px;
        }

        .spinner-border{
            width: 50px;
            height: 50px;
            border: 5px solid black !important;
            border-right-color: transparent !important;
        }
        .cover-photo {
            height: 300px;
            background-position: center;
            z-index: -100;
            background-size: contain;
            background-repeat: no-repeat;
            background-color: #ec6d70;
        }
    </style>
@endsection