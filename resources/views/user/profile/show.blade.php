@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <main id="main" style="margin-top: 70px">
        <div class="cover-photo" style="background-image: url('https://unsplash.it/1000/1000/?random&pic=1');">
            <div class="btn-group">
                <button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-camera"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" onclick="changeCoverPhoto()"><i class="bi bi-camera"></i> <small>Change Cover Photo</small></a>
                    <a class="dropdown-item" onclick="changeProfilePhoto()"><i class="bi bi-camera"></i> <small>Change Profile Photo</small></a>
                    <a class="dropdown-item" onclick="deleteCoverPhoto()"><i class="bi bi-trash"></i> <small>Delete Cover Photo</small></a>
                </div>
                <form id="profile_form">
                    @csrf
                    <input type="file" name="profile" id="profile" style="visibility: hidden">
                </form>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card text-light" style="background: rgba(6,6,6,0.56)">
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
                </div>
            </div>
        </div>
        <div class="profile-pic text-center">
            <img class="profile-picture" src="{{$user->details->profile_image()}}" alt="profile-picture">
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="card">
                        <div class="card-body">
                            <b>About Me -</b> {{$user->details->about_me}}
                            <br>
                            <?php
                                if ($user->details->dob){
                                    $fdate = $user->details->dob;
                                    $tdate = date('Y-m-d');
                                    $datetime1 = strtotime($fdate); // convert to timestamps
                                    $datetime2 = strtotime($tdate); // convert to timestamps
                                    $days = (int)(($datetime2 - $datetime1)/86400/365);
                                }
                                else{
                                    $days=null;
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
                                    @if($hobby)<li class="active">{{$hobby}}</li>@endif
                                @endforeach
                            </ul>
                            <h3>Sports</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->sports) as $hobby)
                                    @if($hobby)<li class="active">{{$hobby}}</li>@endif
                                @endforeach
                            </ul>
                            <h3>Fitness/Outdoors</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->fitness) as $hobby)
                                    @if($hobby)<li class="active">{{$hobby}}</li>@endif
                                @endforeach
                            </ul>
                            <h3>Entertainment / Going Out</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->entertainment) as $hobby)
                                    @if($hobby)<li class="active">{{$hobby}}</li>@endif
                                @endforeach
                            </ul>
                            <h3>Movies</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->movies) as $hobby)
                                    @if($hobby)<li class="active">{{$hobby}}</li>@endif
                                @endforeach
                            </ul>

                            <h3>Music</h3>
                            <ul class="c-select-single">
                                @foreach(explode('@@@',$user->details->music) as $hobby)
                                    @if($hobby)<li class="active">{{$hobby}}</li>@endif
                                @endforeach
                            </ul>

                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-12">
                    <div class="card">
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
                                    <a href=""><i class="bi bi-pencil"></i> Edit my Profile</a>
                                </li>
                                <li>
                                    <a href=""><i class="bi bi-pin-map"></i> Edit Location</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <style>
        .cover-photo{
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
        td.c-bg{
            background-color: #ec6d70;
        }
    </style>
    <script>
        function changeProfilePhoto() {
            $('#profile').click();
        }
        $(function () {
           $(document).on('change','#profile',function (e) {
              $('#profile_form').submit();
              $('#profile').val('');
           });
           $(document).on('submit','#profile_form',function (e) {
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
                       $('.profile-picture').attr('src',data.profile);
                   },
                   error: function (xhr) {
                       erroralert(xhr);
                   }
               });
           });

        });
    </script>
@endsection