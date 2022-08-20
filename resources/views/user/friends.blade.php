@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            This Page will show all your GFS friends, GFS friend requests you get and what they are up
                            to on GFS. If you don't see any results here, why not do a and try adding some new GFS
                            friends?
                        </div>
                        <div class="card-footer">
                            <h5 class="c-color">Requests</h5>

                            <ul style="list-style-type: none;">
                                @foreach(friendRequestsReceived(auth()->user()->id) as $item)
                                <li>
                                    <a href="{{route('user.profile.view',[$item->username])}}" class="d-flex align-items-center justify-content-around">
                                        <div>
                                            <img src="{{$item->details->profile_image()}}" alt="" width="40"> {{$item->name}}
                                        </div>
                                        <div>
                                            <i data-id="{{$item->id}}" class="friend-request-sent approve bi bi-check "></i>
                                            <i data-id="{{$item->id}}" class="friend-request-sent decline bi bi-x"></i>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="col-md-9">

                    <div class="card ">
                        <div class="card-header">
                            <h4 class="c-color">Search All GFS By Username</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('friend.show')}}" method="get">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="s" placeholder="Search ..." value="{{$key}}">
                                    <div class="input-group-append">
                                        <button class="btn border rounded-0" type="submit"><i class='bi bi-search'></i></button>
                                    </div>
                                </div>
                            </form>
                            You can add * to the search to expand the results
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4>Your Girlfriend Social Friends</h4>
                            <h6>You have {{count(getFriendsList(auth()->user()->id))}} friends</h6>
                        </div>
                        <div class="card-body">
                            @foreach($friends as $friend)
                                <div class="col-md-4 d-flex rounded-3 gf-members-thumbnail img-thumbnail align-items-center"
                                onclick="window.location.href='{{route('user.profile.other',[$friend->username])}}'"
                                >
                                    <div>
                                        <img src="{{$friend->details->profile_image()}}" alt="" width="100"
                                             class="img-fluid rounded-3 gf-members-thumbnail">
                                    </div>
                                    <div>
                                        <h6 class="m-0 pl-3 c-color">{{$friend->name}}</h6>
                                        <p class="m-0 pl-3">{{$friend->username}}</p>
                                        <p class="m-0 pl-3">{{getUserAge($friend->id)}} Years old</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(function () {
            $(document).on('click', '.friend-request-sent', function () {
                var id = $(this).attr('data-id');
                var status = null;
                if ($(this).hasClass('approve')) {
                    status = '{{Friends::STATUS_APPROVED}}'
                }
                if ($(this).hasClass('decline')) {
                    status = '{{Friends::STATUS_REJECTED}}'
                }
                var button = $(this), previous =$(this).html();
                button.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing ...');

                $.ajax({
                    type: "POST",
                    url: "{{route('friend.request.action')}}",
                    dataType: "JSON",
                    data: {'id': id, 'status': status, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        location.reload();
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