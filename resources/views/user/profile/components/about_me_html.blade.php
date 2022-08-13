<form id="about_me_form" method="post">
    @csrf
    <div class="alert alert-success alert-dismissible fade show justify-content-between" role="alert" style="display: none;">
        <strong>Success!</strong> <span class="message"></span>
        <span class="close" data-dismiss="alert" aria-label="Close">
            <i class="bi bi-x-circle"></i>
        </span>
    </div>
<div class="row justify-content-center">
    <div class="form-group mt-3">
        <label for="job_title" class="h4  c-h">Job Title</label><br>
        <label for="job_title">
            Want to share what your job is? This will be shown on your profile.
        </label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="job_title" id="job_title" value="{{$de->job_title}}">
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="form-group mt-3">
        <label for="why_you_are_on_gfv" class="h4 c-h">Why You Are on GFV?</label><br>
        <label for="why_you_are_on_gfv">
            Why you are joining Girlfriend Vibez...
        </label>
        <div class="col-md-6">
            <select class="form-control" name="why_you_are_on_gfv" id="why_you_are_on_gfv">
                <option selected disabled>(Select an option)</option>
                <option value="Meet New Girl Friends">Meet New Girl Friends</option>
                <option value="Having a Baby / Meet other Moms">Having a Baby / Meet other Moms</option>
                <option value="Getting Married / GirlFriends Not Married">Getting Married / GirlFriends Not Married</option>
                <option value="Just Moved to A New City">Just Moved to A New City</option>
                <option value="Recently Single / Divorced">Recently Single / Divorced</option>
                <option value="Other/Dont Want To Share">Other/Dont Want To Share</option>
            </select>
            <script>
                @if($de->why_you_are_on_gfv)
                $('#why_you_are_on_gfv option').each(function (i,v) {
                    if ($(this).val()=='{{$de->why_you_are_on_gfv}}'){
                        $(this).attr('selected','selected');
                    }
                });
                @endif
            </script>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="form-group mt-3">
        <label for="personality_type" class="h4 c-h">Personality Type</label><br>
        <label for="personality_type">
            How comfortable are you in social settings with people you do not know?
        </label>
        <div class="col-md-12 ">
            <ul class="c-select-single personality_type">
                <li>Very shy. I have never met someone online before</li>
                <li>Shy. I might need a push to meet people.</li>
                <li>Social. It might take me a bit to warm up though.</li>
                <li>Outgoing. I enjoy most social situations.</li>
                <li>Social Butterfly. I love meeting people anywhere!</li>
            </ul>
            <input type="hidden" name="personality_type" id="personality_type">

            <script>
                $('.c-select-single.personality_type li').click(function () {
                    $('.c-select-single.personality_type li').removeClass('active');
                    $(this).addClass('active');
                    $('#personality_type').val($(this).text());
                });
                @if($de->personality_type)
                $('.c-select-single.personality_type li').each(function (i,v) {
                    if ($(this).html()=='{{$de->personality_type}}'){
                        $(this).addClass('active');
                        $('#personality_type').val('{{$de->personality_type}}');
                    }
                });
                @endif
            </script>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="form-group mt-3">
        <label for="communication_style" class="h4 c-h">Communication Style</label><br>
        <label for="communication_style">
            Ways that you are interested in Communicating with New Friends on GFS. Check All
            that Apply.
        </label>
        <div class="col-md-12 ">
            <ul class="c-select-single communication_style">
                @php $e_com=explode('@@@',$de->communication_style); @endphp
                @php $comstyles=['On Girlfriend Social As Email Buddies','Through IM or Personal Email','Through Text Messaging/ Phone Calls','In Person, When comfortable','Group Meetings'];
                @endphp
                @foreach($comstyles as $comstyle)
                    <li class="{{in_array($comstyle,$e_com)?'active':''}}">{{$comstyle}}</li>
                @endforeach
            </ul>
            <script>
                $('.c-select-single.communication_style li').click(function () {
                    $(this).toggleClass('active');
                    var pets=[];
                    var i=0;
                    $('.c-select-single.communication_style li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#communication_style').val(pets);
                });
                @if($de->communication_style)
                $(function () {
                    var pets=[];
                    var i=0;
                    $('.c-select-single.communication_style li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#communication_style').val(pets);
                });
                @endif
            </script>
            <input type="hidden" name="communication_style" id="communication_style">

        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="form-group mt-3">
        <label for="contact_by_people_from" class="h4 c-h">Connect by People
            from</label><br>
        <label for="contact_by_people_from">
            Let other members know if you are open to penpals, local gals, or maybe the next
            town over... Select all you are comfortable with
        </label>
        <div class="col-md-12 ">
            <ul class="c-select-single contact_by_people_from">
                @php $e_contact=explode('@@@',$de->contact_by_people_from); @endphp
                @php $contacts=['Anyone anywhere ( Pen pals )','From the same local city area','Within a 1-2 hr drive']
                @endphp
                @foreach($contacts as $contact)
                    <li class="{{in_array($contact,$e_contact)?'active':''}}">{{$contact}}</li>
                @endforeach

            </ul>
            <input type="hidden" name="contact_by_people_from" id="contact_by_people_from">
            <script>
                $('.c-select-single.contact_by_people_from li').click(function () {
                    $(this).toggleClass('active');
                    var pets=[];
                    var i=0;
                    $('.c-select-single.contact_by_people_from li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#contact_by_people_from').val(pets);
                });
                @if($de->contact_by_people_from)
                $(function () {
                    var pets=[];
                    var i=0;
                    $('.c-select-single.contact_by_people_from li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#contact_by_people_from').val(pets);
                });
                @endif
            </script>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="form-group mt-3">
        <label for="availability" class="h4 c-h">When Are You Available?
        </label><br>
        <label for="availability">
            If you tend to have certain times of day or days of the week more available to
            meet up with friends list that here. You can always select Don't wish to share.

        </label>
        <div class="col-md-12 ">
            <ul class="c-select-single availability">
                @php $e_availability=explode('@@@',$de->availability); @endphp
                @php $availability=explode(',','Monday Morning,Monday Afternoon,Monday Night,Tuesday Morning,Tuesday Afternoon,Tuesday Night,Wednesday Morning,Wednesday Afternoon,Wednesday Night,Thursday Morning,Thursday Afternoon,Thursday Night,Friday Morning,Friday Afternoon,Friday Night,Saturday Morning,Saturday Afternoon,Saturday Night,Sunday Morning,Sunday Afternoon,Sunday Night,Dont Wish To Share / Ask Me');
                @endphp
                @foreach($availability as $a)
                    <li class="{{in_array($a,$e_availability)?'active':''}}">{{$a}}</li>
                @endforeach
            </ul>
            <input type="hidden" name="availability" id="availability">
            <script>
                $('.c-select-single.availability li').click(function () {
                    $(this).toggleClass('active');
                    var pets=[];
                    var i=0;
                    $('.c-select-single.availability li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#availability').val(pets);
                });
                @if($de->contact_by_people_from)
                $(function () {
                    var pets=[];
                    var i=0;
                    $('.c-select-single.availability li').each(function () {
                        if ($(this).hasClass('active')){
                            pets[i]=$(this).text();
                            i++;
                        }
                    });
                    $('#availability').val(pets);
                });
                @endif
            </script>
        </div>
    </div>
</div>


    <div class="col-md-12 d-flex justify-content-end">
        <div class="btn-group mt-4" role="group" aria-label="Basic example">
            <button type="button" onclick="$('#pills-personal-tab').click()" class="btn btn-secondary btn-lg">Previous</button>
            <button type="button" onclick="$('#pills-interests-tab').click()" class="btn btn-secondary btn-lg">Next</button>
            <button type="submit" class="btn btn-gfv btn-lg">Submit</button>
        </div>
    </div>
</form>
<script>
    $(function () {
        $(document).on('submit','#about_me_form',function (e) {
            e.preventDefault();

            var button = $(this).find('button[type=submit]'), previous =$(this).find('button[type=submit]').html();
            button.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing ...');

            $(this).find('.form-control.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback.is-invalid').remove();
            var alert=$(this).find('.alert');
            alert.hide();
            $.ajax({
                type: "POST",
                url: "{{route('user.about.store')}}",
                data: new FormData(this),
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    button.attr('disabled', null).html(previous);
                    alert.find('.message').html(data.success);
                    alert.css('display','flex');

                    $('html, body').animate({
                        scrollTop: alert.offset().top - 150
                    }, 'slow');
                },
                error: function (xhr) {
                    button.attr('disabled', null).html(previous);
                    erroralert(xhr);
                }
            });
        })
    });
</script>
