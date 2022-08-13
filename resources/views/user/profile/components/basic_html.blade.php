<form id="basic_form" method="post">
    <div class="alert alert-success alert-dismissible fade show justify-content-between" role="alert" style="display: none;">
        <strong>Success!</strong> <span class="message"></span>
        <span class="close" data-dismiss="alert" aria-label="Close">
            <i class="bi bi-x-circle"></i>
        </span>
    </div>

    <input type="hidden" value="{{csrf_token()}}" name="_token">
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="headline" class="h4  c-h">Headline</label>
            <label for="headline">Enter a short headline about you. Example - Single Mom Looking
                to get out and Dance! Reminder - GFS is for Women friendship purposes only. Any
                accounts with inappropriate, selling or sexual themes will be removed.</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="headline" id="headline" value="{{$de->headline}}">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="about_me" class="h4  c-h">About Me</label>
            <label for="about_me">This is the main section of your friendship profile. Go into
                detail about who you are and what you are looking for in friends. You can type A
                LOT in this box - so get to it! Example: I love my job downtown, just moved
                here, have 2 cats and no kids! Let'</label>
            <textarea class="form-control" name="about_me" rows="10" id="about_me">{{$de->about_me}}</textarea>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="gender" class="h4 c-h">Gender</label><br>
            <label for="gender">This site is for *WOMEN ONLY*</label>
            <div class="col-md-6">
                <select class="form-control" name="gender" id="gender" data-rule="gender">
                    <option selected hidden value="">(Select an option)</option>
                    <option value="male" {{$de->gender=='male'?'selected':''}}>Male</option>
                    <option value="female" {{$de->gender=='female'?'selected':''}}>Female</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="employment_group" class="h4 c-h">Employment Group</label><br>
            <label for="employment_group"> This will not be shown on your profile</label>
            <div class="col-md-12 ">
                <ul class="c-select-single employment_group">
                    <li>Professional</li>
                    <li>Sales</li>
                    <li>Self Employed</li>
                    <li>Home Maker/Mom</li>
                    <li>Retired</li>
                    <li>Student</li>
                    <li>Manager</li>
                    <li>Clerical</li>
                    <li>Trades Person</li>
                    <li>Other/Dont wish to Share</li>
                </ul>
                <input type="hidden" name="employment_group" id="employment_group">
                <script>
                    $('.c-select-single.employment_group li').click(function () {
                        $('.c-select-single.employment_group li').removeClass('active');
                        $(this).addClass('active');
                        $('#employment_group').val($(this).text());
                    });
                    @if($de->employment_group)
                    $('.c-select-single.employment_group li').each(function (i,v) {
                        if ($(this).html()=='{{$de->employment_group}}'){
                            $(this).addClass('active');
                            $('#employment_group').val('{{$de->employment_group}}');

                        }
                    });
                    @endif
                </script>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="income_range" class="h4 c-h">HouseHold Income Range</label><br>
            <label for="income_range">This helps us get a better idea of events to offer. This
                will not be shown on your profile and is private. You can choose do not wish to
                share.</label>
            <div class="col-md-6">
                <select class="form-control" name="income_range" id="income_range"
                        data-rule="income_range">
                    <option selected disabled value="" hidden>(Select an option)</option>
                    <option value="Under $25,000">Under $25,000</option>
                    <option value="$25,000-$50,000">$25,000-$50,000</option>
                    <option value="$50,000 -$75,000">$50,000 -$75,000</option>
                    <option value="$75,000-$100,000">$75,000-$100,000</option>
                    <option value="$100,000+">$100,000+</option>
                    <option value="Prefer not to say">Prefer not to say</option>
                </select>
                <script>
                    @if($de->income_range)
                    $('#income_range option').each(function (i,v) {
                        if ($(this).val()=='{{$de->income_range}}'){
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
            <label for="hear_about" class="h4 c-h">Hear About us</label><br>
            <label for="hear_about">Where did you hear about us from?</label>
            <div class="col-md-6">
                <select class="form-control" name="hear_about" id="hear_about" data-rule="hear_about">
                    <option hidden disabled selected value="">(Select an option)</option>
                    <option value="Search Engine">Search Engine</option>
                    <option value="Friend">Friend</option>
                    <option value="News/Media">News/Media</option>
                    <option value="Craigslist">Craigslist</option>
                    <option value="Flyer/Poster">Flyer/Poster</option>
                    <option value="Other">Other</option>
                    <option value="Social Media">Social Media</option>
                </select>
                <script>
                    @if($de->hear_about_us)
                    $('#hear_about option').each(function (i,v) {
                        if ($(this).val()=='{{$de->hear_about_us}}'){
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
            <label for="friend" class="h4  c-h">Friends Name</label>
            <div class="col-md-6 customer_records d-flex">
                <input type="text" class="form-control" name="friend[]" id="friend" data-rule="friend"
                       @if($de->friends)
                       @php $first=explode('@@@',$de->friends); @endphp
                       @if(count($first)>0)
                       value="{{$first[0]}}"
                        @endif
                        @endif
                >
                <a class="extra-fields-customer btn border-0"><i class="bi bi-plus-circle"></i></a>
            </div>
            <div class="customer_records_dynamic col-md-6">
                @if($de->friends)
                    @foreach(explode('@@@',$de->friends) as $k=>$friend)
                        @if($k!=0)
                            <div class="remove d-flex">
                                <input type="text" class="form-control" value="{{$friend}}" name="friend[]" id="friend" data-rule="friend">
                                <a class="remove-field btn-remove-customer btn"><i class="bi bi-x-circle"></i></a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="education_level" class="h4 c-h">Education Level</label><br>
            <label for="education_level">Choose your highest level of education
                completed.</label>
            <div class="col-md-6">
                <select class="form-control" name="education_level" id="education_level"
                        data-rule="education_level">

                    <option selected hidden value="">(Select an option)</option>
                    <option value="High School">High School</option>
                    <option value="Some College">Some College</option>
                    <option value="Some University">Some University</option>
                    <option value="Associates Degree">Associates Degree</option>
                    <option value="Bachelor Degree">Bachelor Degree</option>
                    <option value="Masters Degree">Masters Degree</option>
                    <option value="PhD/ Post Doctoral Degree">PhD/ Post Doctoral Degree</option>
                    <option value="Graduates Degree">Graduates Degree</option>
                    <option value="Other/Dont Wish to Share">Other/Don't Wish to Share</option>

                </select>
                <script>
                    @if($de->education_level)
                    $('#education_level option').each(function (i,v) {
                        if ($(this).val()=='{{$de->education_level}}'){
                            $(this).attr('selected','selected');
                        }
                    });
                    @endif
                </script>
            </div>
        </div>
    </div>
    <div class="col-md-12 d-flex justify-content-end">
        <div class="btn-group mt-4" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary disabled btn-lg">Previous</button>
            <button type="button" onclick="$('#pills-personal-tab').click()" class="btn btn-secondary btn-lg">Next</button>
            <button type="submit" class="btn btn-gfv btn-lg">Submit</button>
        </div>
    </div>
    <script>
        $('.extra-fields-customer').click(function() {
            $('.customer_records').clone().appendTo('.customer_records_dynamic');
            $('.customer_records_dynamic .customer_records').addClass('single remove');
            $('.single .extra-fields-customer').remove();
            $('.single').append('<a class="remove-field btn-remove-customer btn"><i class="bi bi-x-circle"></i></a>');
            $('.customer_records_dynamic > .single').attr("class", "remove d-flex");

        });
        $(document).on('click', '.remove-field', function(e) {
            e.preventDefault();
            $(this).parent('.remove').remove();
        });
    </script>
</form>
<script>
    $(function () {
        $(document).on('submit','#basic_form',function (e) {
            e.preventDefault();

            var button = $(this).find('button[type=submit]'), previous =$(this).find('button[type=submit]').html();
            button.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing ...');

            $(this).find('.form-control.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback.is-invalid').remove();
            var alert=$(this).find('.alert');
            alert.hide();
            $.ajax({
                type: "POST",
                url: "{{route('user.basic.store')}}",
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
