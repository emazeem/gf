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
                        <div class="card-body">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($users as $k=>$user)
                                        <div class="carousel-item {{$k==0?'active':''}} text-center">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="{{$user->details->profile_image()}}" class="img-fluid img-thumbnail" style="border: 4px solid #ec6d70">
                                                    <h5 class="c-color">{{$user->username}}</h5>
                                                    <p>Send Request</p>

                                                    Is this a Man? Selling Something? Have Sexual Tones?
                                                    <p>
                                                        <i class="bi bi-flag"></i>
                                                        Report here
                                                    </p>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="col-md-12 action-btn-{{$user->id}} border border-3 border-danger d-flex justify-content-around align-items-center py-2 rounded-3" style="background-color: rgba(207,96,98,0.15)">
                                                        <div class="">
                                                            <h4 class="text-danger">Would you like to be Friends?</h4>
                                                        </div>
                                                        <div >
                                                            <button data-id="{{$user->id}}" class="match-click no btn btn-danger"><i class="bi bi-x"></i></button>
                                                            <button data-id="{{$user->id}}" class="match-click yes btn btn-success"><i class="bi bi-check"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-4" style="text-align: left;">
                                                        <h4>{{$user->details->why_you_are_on_gfv}}</h4>
                                                        <p>
                                                            <b class="c-color">About Me -</b>
                                                            {{$user->details->about_me}}
                                                        </p>
                                                        <p>
                                                            <b class="c-color">Age -</b>
                                                            {{getUserAge($user->id)}}
                                                            Years Old
                                                        </p>
                                                        <p>
                                                            <b class="c-color">Location -</b>
                                                            {{$user->details->location}}

                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <a class="carousel-control-prev" style="width: 1px;height: 1px" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    {{--<i class="bi bi-arrow-left"></i>--}}
                                </a>
                                <a class="carousel-control-next"  style="width: 1px;height: 1px" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    {{--<i class="bi bi-arrow-right"></i>--}}
                                </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            Select Yes or No above to match with local women to you.  We still have {{count($users)}} users for you to match with!
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
                            <a class="c-color" href="{{route('user.location.edit')}}">Change or try updating your address here.</a>
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
                var button = $(this), previous =$(this).html();
                button.attr('disabled', 'disabled').html('...');
                $.ajax({
                    type: "POST",
                    url: "{{route('match.action')}}",
                    dataType: "JSON",
                    data: {'to': to, 'status': status, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        button.attr('disabled', null).html(previous);
                        $('.action-btn-'+to).html('<h4>You have taken action on it.</h4>');
                        $('.carousel-control-next').trigger('click');
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