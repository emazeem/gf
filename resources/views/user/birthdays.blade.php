@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h4 class="c-color">Birthdays</h4>
                    </div>
                    <div class="card-body">
                        <h5>{{date('F')}}</h5>
                        <div class="row">
                            @foreach($users as $friend)
                                <div class="col-md-4 d-flex rounded-3 gf-members-thumbnail img-thumbnail align-items-center"
                                     onclick="window.location.href='{{route('user.profile.other',[$friend->username])}}'">
                                    <div>
                                        <img src="{{$friend->details->profile_image()}}" alt="" width="100"
                                             class="img-fluid rounded-3 gf-members-thumbnail">
                                    </div>
                                    <div class="p-3">
                                        <h6 class="m-0 pl-3 c-color">{{$friend->name}}</h6>
                                        <p class="m-0 pl-3">{{getUserAge($friend->id)}} Years old</p>
                                        <b class="m-0 pl-3"> <i class="bi bi-calendar-date"></i> {{date('d F',strtotime($friend->details->dob))}}</b>
                                        <br>
                                        <a href="{{route('user.chat',[$friend->id])}}"
                                           class="btn btn-light border px-3"><i class="bi bi-envelope"></i> Send message</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection