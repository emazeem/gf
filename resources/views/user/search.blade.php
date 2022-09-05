@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card ">
                        <div class="card-header">
                            <h4 class="c-color">Search All GFV By Username</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('search.show')}}" method="get" class="row">
                                @csrf
                                {{--DONE--}}
                                <div class="form-group col-md-4">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                           placeholder="Location" value="{{$requests['location'] ?? null}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="km">Within Kilometers</label>
                                    <select class="form-control" id="km" name="km">
                                        <option selected value="" hidden></option>
                                        <option value="5">5 Kilometers</option>
                                        <option value="10">10 Kilometers</option>
                                        <option value="15">15 Kilometers</option>
                                        <option value="20">20 Kilometers</option>
                                    </select>
                                </div>

                                {{--DONE--}}
                                <div class="form-group col-md-4">
                                    <label for="age">Your Friend's Age Range</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="age" name="min_age" placeholder="Min" value="{{$requests['min_age'] ?? null}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="age" name="max_age" placeholder="Max" value="{{$requests['max_age'] ?? null}}">
                                        </div>
                                    </div>
                                </div>
                                {{--DONE--}}
                                <div class="form-group col-md-12">
                                    <label for="location">Key</label>
                                    <input type="text" class="form-control" id="key" name="key"
                                           placeholder="Key" value="{{$requests['key']  ?? null}}">
                                </div>
                                {{--DONE--}}
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Does Your Friend Have Children?</h6>
                                        <label class="form-check-label col-12" id="children">
                                            <input type="radio" class="form-check-input" id="children" name="children"
                                                   value="No Children" @if($requests['children'] ?? null) {{$requests['children']=='No Children'?'checked':''}} @endif>No
                                        </label>
                                        <label class="form-check-label col-12" id="children">
                                            <input type="radio" class="form-check-input" id="children" name="children"
                                                   value="Yes I Have Children" @if($requests['children'] ?? null) {{$requests['children']=='Yes I Have Children'?'checked':''}} @endif>Yes
                                        </label>
                                        <label class="form-check-label col-12" id="children">
                                            <input type="radio" class="form-check-input" id="children" name="children"
                                                   value="Prefer Not To Say" @if($requests['children'] ?? null) {{$requests['children']=='Prefer Not To Say'?'checked':''}} @endif>Prefer Not To Say
                                        </label>
                                        <label class="form-check-label col-12" id="children">
                                            <input type="radio" class="form-check-input" id="children" name="children" value="0"
                                            @if($requests['children'] ?? null) {{$requests['children']== 0 ?'checked':''}} @endif> Not Important
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Does Your Friend Smoke??</h6>
                                        <label class="form-check-label col-12" id="smoke">
                                            <input type="radio" class="form-check-input" id="smoke" name="smoke"
                                                   value="No" @if($requests['smoke'] ?? null) {{$requests['smoke']== 'No' ?'checked':''}} @endif>No
                                        </label>
                                        <label class="form-check-label col-12" id="smoke">
                                            <input type="radio" class="form-check-input" id="smoke" name="smoke"
                                                   value="Yes" @if($requests['smoke'] ?? null) {{$requests['smoke']== 'Yes' ?'checked':''}} @endif>Yes
                                        </label>
                                        <label class="form-check-label col-12" id="smoke">
                                            <input type="radio" class="form-check-input" id="smoke" name="smoke"
                                                   value="0" @if($requests['smoke'] ?? null) {{$requests['smoke']== '0' ?'checked':''}} @endif>Not Important
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Does Your Friend Drink?</h6>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" @if($requests['drink'] ?? null) {{$requests['drink']== 'Yes, Daily' ?'checked':''}} @endif class="form-check-input" id="drink" name="drink" value="Yes, Daily">Daily</label>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" @if($requests['drink'] ?? null) {{$requests['drink']== 'Yes, Sometimes' ?'checked':''}} @endif class="form-check-input" id="drink" name="drink" value="Yes, Sometimes">Sometimes</label>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" @if($requests['drink'] ?? null) {{$requests['drink']== 'Yes, Rarely' ?'checked':''}} @endif class="form-check-input" id="drink" name="drink" value="Yes, Rarely">Rarely</label>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" @if($requests['drink'] ?? null) {{$requests['drink']== 'No' ?'checked':''}} @endif class="form-check-input" id="drink" name="drink" value="No">Never</label>
                                        <label class="form-check-label col-12" id="drink"><input type="radio" @if($requests['drink'] ?? null) {{$requests['drink']== '0' ?'checked':''}} @endif class="form-check-input" id="drink" name="drink" value="0">Not Important</label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Why Is Your Friend on GFV?</h6>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" @if($requests['why'] ?? null) {{$requests['why']== 'Meet New Girl Friends' ?'checked':''}} @endif  value="Meet New Girl Friends">Meet New Girl Friends</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" @if($requests['why'] ?? null) {{$requests['why']== 'Having a Baby / Meet other Moms' ?'checked':''}} @endif  value="Having a Baby / Meet other Moms">Having a Baby / Meet other Moms</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" @if($requests['why'] ?? null) {{$requests['why']== 'Getting Married / GirlFriends Not Married' ?'checked':''}} @endif  value="Getting Married / GirlFriends Not Married"> Getting Married / GirlFriends Not Married</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" @if($requests['why'] ?? null) {{$requests['why']== 'Just Moved to A New City' ?'checked':''}} @endif  value="Just Moved to A New City">Just Moved to A New City</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" @if($requests['why'] ?? null) {{$requests['why']== 'Recently Single / Divorced' ?'checked':''}} @endif  value="Recently Single / Divorced">Recently Single / Divorced</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" @if($requests['why'] ?? null) {{$requests['why']== 'Other/Dont Want To Share' ?'checked':''}} @endif  value="Other/Dont Want To Share">Other/Don't Want To Share</label>
                                        <label class="form-check-label col-12" id="why"><input type="radio" class="form-check-input" id="why" name="why" @if($requests['why'] ?? null) {{$requests['why']== 0 ?'checked':''}} @endif  value="0">Not Important</label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Your Friend's Personality Type</h6>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" @if($requests['personality'] ?? null) {{$requests['personality']== 'Very shy. I have never met someone online before' ?'checked':''}} @endif value="Very shy. I have never met someone online before">Very shy. I have never met someone online before</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" @if($requests['personality'] ?? null) {{$requests['personality']== 'Shy. I might need a push to meet people.' ?'checked':''}} @endif value="Shy. I might need a push to meet people.">Shy. I might need a push to meet people.</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" @if($requests['personality'] ?? null) {{$requests['personality']== 'Social. It might take me a bit to warm up though.' ?'checked':''}} @endif value="Social. It might take me a bit to warm up though.">Social. It might take me a bit to warm up though.</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" @if($requests['personality'] ?? null) {{$requests['personality']== 'Outgoing. I enjoy most social situations.' ?'checked':''}} @endif value="Outgoing. I enjoy most social situations.">Outgoing. I enjoy most social situations.</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" @if($requests['personality'] ?? null) {{$requests['personality']== 'Social Butterfly. I love meeting people anywhere!' ?'checked':''}} @endif value="Social Butterfly. I love meeting people anywhere!">Social Butterfly. I love meeting people anywhere!</label>
                                        <label class="form-check-label col-12" id="personality"><input type="radio" class="form-check-input" id="personality" name="personality" @if($requests['personality'] ?? null) {{$requests['personality']== '0' ?'checked':''}} @endif value="0">Not Important</label>
                                    </div>
                                </div>
                                <div class="form-check col-md-4 mt-3">
                                    <div class="border p-2 rounded-3">
                                        <h6 class="c-color">Your Friend's Communication Style</h6>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" @if($requests['communication'] ?? null) {{$requests['communication']== 'On Girlfriend Social As Email Buddies' ?'checked':''}} @endif value="On Girlfriend Social As Email Buddies">On Girlfriend Social As Email Buddies</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" @if($requests['communication'] ?? null) {{$requests['communication']== 'Through IM or Personal Email' ?'checked':''}} @endif value="Through IM or Personal Email">Through IM or Personal Email</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" @if($requests['communication'] ?? null) {{$requests['communication']== 'Through Text Messaging/ Phone Calls' ?'checked':''}} @endif value="Through Text Messaging/ Phone Calls">Through Text Messaging/ Phone Calls</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" @if($requests['communication'] ?? null) {{$requests['communication']== 'In Person, When comfortable' ?'checked':''}} @endif value="In Person, When comfortable">In Person, When comfortable</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" @if($requests['communication'] ?? null) {{$requests['communication']== 'Group Meetings' ?'checked':''}} @endif value="Group Meetings">Group Meetings</label>
                                        <label class="form-check-label col-12" id="communication"><input type="radio" class="form-check-input" id="communication" name="communication" @if($requests['communication'] ?? null) {{$requests['communication']== '0' ?'checked':''}} @endif value="Not Important">Not Important</label>
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
                            <h4>Your Girlfriend Vibez Friends</h4>
                            <h6>You have {{count(getFriendsList(auth()->user()->id))}} friends</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($users as $user)
                                    <div class="col-md-3 d-flex rounded-3 gf-members-thumbnail img-thumbnail align-items-center"
                                         onclick="window.location.href='{{route('user.profile.other',[$user->username])}}'">
                                        <div>
                                            <img src="{{$user->details->profile_image()}}" alt="" width="140"
                                                 class="img-fluid gf-members-thumbnail p-2 rounded-3">
                                        </div>
                                        <div>
                                            <h6 class=" c-color">{{$user->name}}</h6>
                                            <p class="m-0">{{$user->username}}</p>
                                            <p class="m-0">{{getUserAge($user->id)}} Years old</p>
                                            @if(\App\Models\Chat::where('from',auth()->user()->id)->where('to',$user->id)->get()->count()>0)
                                                <p><i class="bi bi-star-fill text-warning"></i> Messaged</p>
                                            @endif
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