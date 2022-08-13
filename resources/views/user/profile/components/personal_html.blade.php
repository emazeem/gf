<form id="personal_form" method="post">
@csrf
    <div class="alert alert-success alert-dismissible fade show justify-content-between" role="alert" style="display: none;">
        <strong>Success!</strong> <span class="message"></span>
        <span class="close" data-dismiss="alert" aria-label="Close">
            <i class="bi bi-x-circle"></i>
        </span>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="dob" class="h4  c-h">Date of Birth</label>
            <label for="dob">Enter in your Birthday - You must be at least 18 to use this site.
                We will only show your age on your profile not your actual birthday.</label>
            <div class="col-md-6">
                <input type="date" class="form-control" name="dob" id="dob" value="{{$de->dob}}" data-rule="dob">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="astrology" class="h4 c-h">Astrology</label><br>
            <label for="astrology">
                What's Your Sign? If you don't wish to share choose that option.
            </label>
            <div class="col-md-6">
                <select class="form-control" name="astrology" id="astrology" data-rule="astrology">
                    <option selected disabled value="" hidden>(Select an option)</option>
                    <option value="Libra">Libra</option>
                    <option value="Virgo">Virgo</option>
                    <option value="Leo">Leo</option>
                    <option value="Cancer">Cancer</option>
                    <option value="Scorpio">Scorpio</option>
                    <option value="Sagittarius">Sagittarius</option>
                    <option value="Gemini">Gemini</option>
                    <option value="Taurus">Taurus</option>
                    <option value="Aries">Aries</option>
                    <option value="Pisces">Pisces</option>
                    <option value="Aquarius">Aquarius</option>
                    <option value="Capricorn">Capricorn</option>
                    <option value="No Answer">No Answer</option>
                </select>
            </div>
            <script>
                @if($de->astrology)
                $('#astrology option').each(function (i,v) {
                    if ($(this).val()=='{{$de->astrology}}'){
                        $(this).attr('selected','selected');
                    }
                });
                @endif
            </script>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="relationship_status" class="h4 c-h">Relationship Status</label><br>
            <label for="relationship_status">
                Tell us about your relationship status.
            </label>
            <div class="col-md-6">
                <select class="form-control" name="relationship_status" id="relationship_status" data-rule="relationship_status">
                    <option selected disabled value="" hidden>(Select an option)</option>
                    <option value="Single">Single</option>
                    <option value="In a Relationship">In a Relationship</option>
                    <option value="Engaged">Engaged</option>
                    <option value="Married">Married</option>
                    <option value="Not Looking">Not Looking</option>
                    <option value="Separated/Divorced">Separated/Divorced</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Dont Wish to Share">Don't Wish to Share</option>
                </select>
            </div>
            <script>
                @if($de->relationship)
                $('#relationship_status option').each(function (i,v) {
                    if ($(this).val()=='{{$de->relationship}}'){
                        $(this).attr('selected','selected');
                    }
                });
                @endif
            </script>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="children" class="h4 c-h">Children</label><br>
            <label for="children">
                Do you have children?
            </label>
            <div class="col-md-6">
                <select class="form-control" name="children" id="children" data-rule="children">
                    <option selected disabled value="" hidden>(Select an option)</option>
                    <option value="No Children">No Children</option>
                    <option value="Yes I Have Children">Yes I Have Children</option>
                    <option value="Prefer Not To Say">Prefer Not To Say</option>
                </select>
                <script>
                    @if($de->children)
                    $('#children option').each(function (i,v) {
                        if ($(this).val()=='{{$de->children}}'){
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
            <label for="smoke" class="h4 c-h">Do you smoke?</label><br>
            <div class="col-md-12 ">
                <ul class="c-select-single smoke">
                    <li>Yes</li>
                    <li>No</li>
                </ul>
                <input type="hidden" class="form-control" name="smoke" id="smoke">
                <script>
                    $('.c-select-single.smoke li').click(function () {
                        $('.c-select-single.smoke li').removeClass('active');
                        $(this).addClass('active');
                        $('#smoke').val($(this).text());
                    });
                    @if($de->smoke)
                    $('.c-select-single.smoke li').each(function (i,v) {
                        if ($(this).html()=='{{$de->smoke}}'){
                            $(this).addClass('active');
                            $('#smoke').val('{{$de->smoke}}');
                        }
                    });
                    @endif
                </script>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="pets" class="h4 c-h">Do you have any pets?</label><br>
            <div class="col-md-12 ">
                <ul class="c-select-single pets">
                    @php $e_pets=explode('@@@',$de->pets); @endphp
                    <li class="{{in_array('Cat',$e_pets)?'active':''}}">Cat</li>
                    <li class="{{in_array('Dog',$e_pets)?'active':''}}">Dog</li>
                    <li class="{{in_array('Birds',$e_pets)?'active':''}}">Birds</li>
                    <li class="{{in_array('Fish',$e_pets)?'active':''}}">Fish</li>
                    <li class="{{in_array('Reptiles',$e_pets)?'active':''}}">Reptiles</li>
                    <li class="{{in_array('Other',$e_pets)?'active':''}}">Other</li>
                    <li class="{{in_array('None',$e_pets)?'active':''}}">None</li>
                </ul>
                <script>
                    $('.c-select-single.pets li').click(function () {
                        $(this).toggleClass('active');
                        var pets=[];
                        var i=0;
                        $('.c-select-single.pets li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#pets').val(pets);
                    });
                    @if($de->pets)
                    $(function () {
                        var pets=[];
                        var i=0;
                        $('.c-select-single.pets li').each(function () {
                            if ($(this).hasClass('active')){
                                pets[i]=$(this).text();
                                i++;
                            }
                        });
                        $('#pets').val(pets);
                    });
                    @endif
                </script>

                <input type="hidden" class="form-control" name="pets" id="pets">
            </div>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group mt-3">
            <label for="drink" class="h4 c-h">Do you drink?</label><br>
            <div class="col-md-12 ">
                <ul class="c-select-single drink">
                    <li>Yes, Daily</li>
                    <li>Yes, Sometimes</li>
                    <li>Yes, Rarely</li>
                    <li>No</li>
                </ul>
                <script>
                    $('.c-select-single.drink li').click(function () {
                        $('.c-select-single.drink li').removeClass('active');
                        $(this).addClass('active');
                        $('#drink').val($(this).text());
                    });
                    @if($de->drink)
                    $('.c-select-single.drink li').each(function (i,v) {
                        if ($(this).html()=='{{$de->drink}}'){
                            $(this).addClass('active');
                        }
                    });
                    @endif
                </script>
                <input type="hidden" class="form-control" name="drink" id="drink" value="{{$de->drink}}">
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <div class="btn-group mt-4" role="group" aria-label="Basic example">
                    <button type="button" onclick="$('#pills-basic-tab').click()" class="btn btn-secondary btn-lg">Previous</button>
                    <button type="button" onclick="$('#pills-about-tab').click()" class="btn btn-secondary btn-lg">Next</button>
                    <button type="submit" class="btn btn-gfv btn-lg">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(function () {
        $(document).on('submit','#personal_form',function (e) {
            e.preventDefault();

            var button = $(this).find('button[type=submit]'), previous =$(this).find('button[type=submit]').html();
            button.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing ...');

            $(this).find('.form-control.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback.is-invalid').remove();
            var alert=$(this).find('.alert');
            alert.hide();
            $.ajax({
                type: "POST",
                url: "{{route('user.personal.store')}}",
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
