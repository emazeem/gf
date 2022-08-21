@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        @include('user.match.components.nav')
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4 class="c-color">My Likes</h4>
                            You rated these profiles “yes”. If they also click yes on your profile, it will move to
                            showing up under mutual match. You could also send them a direct message instead to start
                            making friends right away!
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($users as $k=>$user)
                                    <div class="col-md-4">
                                        <img src="{{$user->details->profile_image()}}" width="200"
                                             class="img-fluid img-thumbnail"
                                             style="border: 4px solid #ec6d70">
                                        <h5 class="c-color">{{$user->username}}</h5>

                                        <button data-id="{{$user->id}}" class="match-click no btn btn-danger"><i
                                                    class="bi bi-x"></i></button>

                                        <a href="{{route('user.chat',[$user->id])}}"
                                           class="match-click yes btn btn-primary"><i class="bi bi-envelope"></i></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-center">
                        <p>Do you want to match with only specific ages in your area?</p>
                        <button class="btn btn-danger c-bg">UPGRADE</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <div class="card ">
                    <div class="card-body text-center">
                        We are matching you with women near :<br>
                        <b class="c-color">{{auth()->user()->details->location}}</b><br>
                        If this is not correct, or you are not seeing results on this page, you may need to
                        <a class="c-color" href="{{route('user.location.edit')}}">Change or try updating your address
                            here.</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script>
        $(function () {
            $('.carousel').carousel({
                interval: false,
            });
            $(document).on('click', '.match-click', function () {
                var to = $(this).attr('data-id');
                var status = null;
                if ($(this).hasClass('yes')) {
                    status = 'yes'
                }
                if ($(this).hasClass('no')) {
                    status = 'no'
                }
                var button = $(this), previous = $(this).html();
                button.attr('disabled', 'disabled').html('...');
                $.ajax({
                    type: "POST",
                    url: "{{route('match.action')}}",
                    dataType: "JSON",
                    data: {'to': to, 'status': status, _token: '{{csrf_token()}}'},
                    success: function (data) {

                    },
                    error: function (xhr) {
                        button.attr('disabled', null).html(previous);
                        erroralert(xhr);
                    }
                });
            });
        });
    </script>
@endsection