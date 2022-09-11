@extends('admin.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @php $url=str_replace('index','',Route::currentRouteName()); @endphp
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Users</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('a.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('a.dashboard')}}">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"><img src="{{$user->details->profile_image()}}" class="rounded-circle"
                                                    width="150">
                            <h4 class="card-title m-t-10">{{$user->name}}</h4>
                            <h6 class="card-subtitle">{{$user->username}}</h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                        <font class="font-medium">{{getUserAge($user->id)}} Yr Old</font>
                                    </a></div>

                            </div>
                        </center>
                    </div>
                    <div class="card-header" style="background: url('{{$user->details->cover_image()}}');background-size: contain;height: 100px;background-repeat: no-repeat"></div>

                    <div class="card-body">
                        <small class="text-muted">Email address</small>
                        <h6>{{$user->email}}</h6>
                        <small class="text-muted p-t-30 db">Last Login</small>
                        <h6>{{$user->last_login}}</h6>
                        <small class="text-muted p-t-30 db">Joined GFV</small>
                        <h6>{{$user->created_at}}</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2">
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line form-control-sm"
                                           value="{{$user->name}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Headline</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line form-control-sm"
                                           value="{{$user->details->headline}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Location</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line form-control-sm"
                                           value="{{$user->details->location}}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">About me</label>
                                <div class="col-md-12">
                                    <textarea rows="2" class="form-control form-control-line"
                                              disabled>{{$user->details->about_me}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Income Range</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line form-control-sm"
                                           value="{{$user->details->income_range}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Employment Group</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line form-control-sm"
                                           value="{{$user->details->employment_group}}" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <label class="col-md-12"><b>Like Travelling?</b> {{$user->details->travel}}</label>
                        <label class="col-md-12"><b>Favourite Season?</b> {{$user->details->favourite_season}}</label>
                        <label class="col-md-12"><b>Spot for Vacations?</b> {{$user->details->spot_for_vacation}}
                        </label>
                        <label class="col-md-12"><b>Education Level?</b> {{$user->details->education_level}}</label>
                        <label class="col-md-12"><b>Date of birth?</b> {{date('d F,y',strtotime($user->details->dob))}}
                        </label>
                        <label class="col-md-12"><b>Astrology?</b> {{$user->details->astrology}}</label>
                        <label class="col-md-12"><b>Relationship Status?</b> {{$user->details->relationship}}</label>
                        <label class="col-md-12"><b>Have Children?</b> {{$user->details->children}}</label>
                        <label class="col-md-12"><b>Do you smoke?</b> {{$user->details->smoke}}</label>
                        <label class="col-md-12"><b>Do you drink?</b> {{$user->details->drink}}</label>
                        <label class="col-md-12"><b>Job title?</b> {{$user->details->job_title}}</label>
                        <label class="col-md-12"><b>Why are you on gfv?</b> {{$user->details->why_you_are_on_gfv}}</label>
                        <label class="col-md-12"><b>Personality Type?</b> {{$user->details->personality_type}}</label>
                        <label class="col-md-12"><b>Communication Style?</b> {{$user->details->communication_style}}</label>
                        <label class="col-md-12"><b>Contact by people from?</b> {{$user->details->contact_by_people_from}}</label>
                        <hr>
                        <label class="col-md-12"><b>Fav TV Show?</b> {{$user->details->fav_tv_shows}}</label>
                        <label class="col-md-12"><b>Fav Movies?</b> {{$user->details->fav_movies}}</label>
                        <label class="col-md-12"><b>Fav Hobbies?</b> {{$user->details->fav_hobbies}}</label>
                        <label class="col-md-12"><b>Fav Teams?</b> {{$user->details->fav_teams}}</label>
                        <label class="col-md-12"><b>Fav Bands?</b> {{$user->details->fav_bands}}</label>
                        <label class="col-md-12"><b>Fav Books?</b> {{$user->details->fav_books}}</label>
                        <hr>
                        <label class="col-md-12"><b>Pets? </b> @foreach(explode('@@@',$user->details->pets) as $pet)
                                <span class="text-decoration-underline">{{$pet}}</span> @endforeach</label>
                        <label class="col-md-12"><b>Hobbies? </b> @foreach(explode('@@@',$user->details->hobbies) as $pet)
                                <span class="text-decoration-underline">{{$pet}}</span> @endforeach</label>
                        <label class="col-md-12"><b>Sports? </b> @foreach(explode('@@@',$user->details->sports) as $pet)
                                <span class="text-decoration-underline">{{$pet}}</span> @endforeach</label>
                        <label class="col-md-12"><b>Fitness? </b> @foreach(explode('@@@',$user->details->fitness) as $pet)
                                <span class="text-decoration-underline">{{$pet}}</span> @endforeach</label>
                        <label class="col-md-12"><b>Entertainment? </b> @foreach(explode('@@@',$user->details->entertainment) as $pet)
                                <span class="text-decoration-underline">{{$pet}}</span> @endforeach</label>
                        <label class="col-md-12"><b>Music? </b> @foreach(explode('@@@',$user->details->music) as $pet)
                                <span class="text-decoration-underline">{{$pet}}</span> @endforeach</label>
                        <label class="col-md-12"><b>Movies? </b> @foreach(explode('@@@',$user->details->movies) as $pet)
                                <span class="text-decoration-underline">{{$pet}}</span> @endforeach</label>
                        <label class="col-md-12"><b>Books? </b> @foreach(explode('@@@',$user->details->books) as $pet)
                                <span class="text-decoration-underline">{{$pet}}</span> @endforeach</label>

                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>

@endsection
