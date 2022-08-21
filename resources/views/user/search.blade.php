@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card ">
                        <div class="card-header">
                            <h4 class="c-color">Search All GFS By Username</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('search.show')}}" method="get" class="row">
                                @csrf
                                <div class="form-group col-md-4">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                           placeholder="Location" value="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="location">Within Kilometers</label>
                                    <select class="form-control" id="location" name="location">
                                        <option selected value="" hidden></option>
                                        <option value="5">5 Kilometers</option>
                                        <option value="10">10 Kilometers</option>
                                        <option value="15">15 Kilometers</option>
                                        <option value="20">20 Kilometers</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="age">Your Friend's Age Range</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="age" name="min_age"
                                                   placeholder="Min" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="age" name="max_age"
                                                   placeholder="Max" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Does Your Friend Have Children?</h6>
                                        <label class="form-check-label col-12" id="children">
                                            <input type="radio" class="form-check-input" id="children" name="children"
                                                   value="No">No
                                        </label>
                                        <label class="form-check-label col-12" id="children">
                                            <input type="radio" class="form-check-input" id="children" name="children"
                                                   value="Yes">Yes
                                        </label>
                                        <label class="form-check-label col-12" id="children">
                                            <input type="radio" class="form-check-input" id="children" name="children"
                                                   value="Prefer Not To Say">Prefer Not To Say
                                        </label>
                                        <label class="form-check-label col-12" id="children">
                                            <input type="radio" class="form-check-input" id="children" name="children"
                                                   value="Prefer Not To Say">Not Important
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Does Your Friend Smoke??</h6>
                                        <label class="form-check-label col-12" id="smoke">
                                            <input type="radio" class="form-check-input" id="smoke" name="smoke"
                                                   value="No">No
                                        </label>
                                        <label class="form-check-label col-12" id="smoke">
                                            <input type="radio" class="form-check-input" id="smoke" name="smoke"
                                                   value="Yes">Yes
                                        </label>
                                        <label class="form-check-label col-12" id="smoke">
                                            <input type="radio" class="form-check-input" id="smoke" name="smoke"
                                                   value="Prefer Not To Say">Not Important
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Does Your Friend Drink?</h6>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" class="form-check-input" id="drink" name="drink" value="Daily">Daily</label>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" class="form-check-input" id="drink" name="drink" value="Sometimes">Sometimes</label>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" class="form-check-input" id="drink" name="drink" value="Rarely">Rarely</label>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" class="form-check-input" id="drink" name="drink" value="Never">Never</label>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" class="form-check-input" id="drink" name="drink" value="Not Important">Not Important</label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Why Is Your Friend on GFS?</h6>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" value="Meet New Girl Friends">Meet New Girl Friends</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" value="Having a Baby / Meet other Moms">Having a Baby / Meet other Moms</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" value="Getting Married / GirlFriends Not Married"> Getting Married / GirlFriends Not Married</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" value="Just Moved to A New City">Just Moved to A New City</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" value="Recently Single / Divorced">Recently Single / Divorced</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" value="Other/Don't Want To Share">Other/Don't Want To Share</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" value="Not Important">Not Important</label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Your Friend's Personality Type</h6>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" value="Very shy. I have never met someone online before">Very shy. I have never met someone online before</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" value="Shy. I might need a push to meet people.">Shy. I might need a push to meet people.</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" value="Social. It might take me a bit to warm up though.">Social. It might take me a bit to warm up though.</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" value="Outgoing. I enjoy most social situations.">Outgoing. I enjoy most social situations.</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" value="Social Butterfly. I love meeting people anywhere!">Social Butterfly. I love meeting people anywhere!</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" value="Not Important">Not Important</label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Your Friend's Communication Style</h6>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" value="On Girlfriend Social As Email Buddies">On Girlfriend Social As Email Buddies</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" value="Through IM or Personal Email">Through IM or Personal Email</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" value="Through Text Messaging/ Phone Calls">Through Text Messaging/ Phone Calls</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" value="In Person, When comfortable">In Person, When comfortable</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" value="Group Meetings">Group Meetings</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" value="Not Important">Not Important</label>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: right">
                                    <button class="btn border rounded-0" type="submit"><i class='bi bi-search'></i>
                                        Search
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4>Your Girlfriend Social Friends</h4>
                            <h6>You have {{count(getFriendsList(auth()->user()->id))}} friends</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($friends as $friend)
                                    <div class="col-md-3 d-flex rounded-3 gf-members-thumbnail img-thumbnail align-items-center"
                                         onclick="window.location.href='{{route('user.profile.other',[$friend->username])}}'">
                                        <div>
                                            <img src="{{$friend->details->profile_image()}}" alt="" width="100"
                                                 class="img-fluid rounded-3 gf-members-thumbnail">
                                        </div>
                                        <div>
                                            <h6 class=" c-color">{{$friend->name}}</h6>
                                            <p class="m-0">{{$friend->username}}</p>
                                            <p class="m-0">{{getUserAge($friend->id)}} Years old</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


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
                var button = $(this), previous = $(this).html();
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