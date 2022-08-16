<div class="col-md-12 mt-md-5">
    <h4 class="c-color">General Account User Settings</h4>
    <form class="form-horizontal" id="account-form" method="post" autocomplete="off">
        @csrf
        <div class="alert alert-success alert-dismissible fade show justify-content-between" role="alert" style="display: none;">
            <strong>Success!</strong> <span class="message"></span>
            <span onclick="$('.alert').css('display','none')">
            <i class="bi bi-x-circle"></i>
            </span>
        </div>



        <div class="form-group">
            <label for="email" class="col-form-label ">{{ __('Email Address') }}</label>
            <div class="col-md-4">
                <input id="email" type="email" class="form-control" name="email" value="{{auth()->user()->email}}"  disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="username" class="col-form-label ">{{ __('Username') }}</label>
            <div class="col-md-4">
                <input id="username" type="text" class="form-control" name="username" value="{{auth()->user()->username}}">
            </div>
        </div>
        <div class="form-group">
            <label for="timezone" class="col-form-label ">{{ __('Timezone') }}</label><br>
            <label for="timezone"><small>
                    Select the city closest to you that shares your same timezone.
                </small></label>

            <div class="col-md-4">
                <select id="timezone" type="text" class="form-control" name="timezone">
                    <option hidden disabled selected>(Select timezone)</option>
                    <option value="US/Pacific">(UTC-8) Pacific Time (US &amp; Canada)</option>
                    <option value="US/Mountain">(UTC-7) Mountain Time (US &amp; Canada)</option>
                    <option value="US/Central">(UTC-6) Central Time (US &amp; Canada)</option>
                    <option value="US/Eastern">(UTC-5) Eastern Time (US &amp; Canada)</option>
                    <option value="America/Halifax">(UTC-4)  Atlantic Time (Canada)</option>
                    <option value="America/Anchorage">(UTC-9)  Alaska (US &amp; Canada)</option>
                    <option value="Pacific/Honolulu">(UTC-10) Hawaii (US)</option>
                    <option value="Pacific/Samoa">(UTC-11) Midway Island, Samoa</option>
                    <option value="Etc/GMT-12">(UTC-12) Eniwetok, Kwajalein</option>
                    <option value="Canada/Newfoundland">(UTC-3:30) Canada/Newfoundland</option>
                    <option value="America/Buenos_Aires">(UTC-3) Brasilia, Buenos Aires, Georgetown</option>
                    <option value="Atlantic/South_Georgia">(UTC-2) Mid-Atlantic</option>
                    <option value="Atlantic/Azores">(UTC-1) Azores, Cape Verde Is.</option>
                    <option value="Europe/London">Greenwich Mean Time (Lisbon, London)</option>
                    <option value="Europe/Berlin">(UTC+1) Amsterdam, Berlin, Paris, Rome, Madrid</option>
                    <option value="Europe/Athens">(UTC+2) Athens, Helsinki, Istanbul, Cairo, E. Europe</option>
                    <option value="Europe/Moscow">(UTC+3) Baghdad, Kuwait, Nairobi, Moscow</option>
                    <option value="Iran">(UTC+3:30) Tehran</option>
                    <option value="Asia/Dubai">(UTC+4) Abu Dhabi, Kazan, Muscat</option>
                    <option value="Asia/Kabul">(UTC+4:30) Kabul</option>
                    <option value="Asia/Yekaterinburg">(UTC+5) Islamabad, Karachi, Tashkent</option>
                    <option value="Asia/Calcutta">(UTC+5:30) Bombay, Calcutta, New Delhi</option>
                    <option value="Asia/Katmandu">(UTC+5:45) Nepal</option>
                    <option value="Asia/Omsk">(UTC+6) Almaty, Dhaka</option>
                    <option value="Indian/Cocos">(UTC+6:30) Cocos Islands, Yangon</option>
                    <option value="Asia/Krasnoyarsk">(UTC+7) Bangkok, Jakarta, Hanoi</option>
                    <option value="Asia/Hong_Kong">(UTC+8) Beijing, Hong Kong, Singapore, Taipei</option>
                    <option value="Asia/Tokyo">(UTC+9) Tokyo, Osaka, Sapporto, Seoul, Yakutsk</option>
                    <option value="Australia/Adelaide">(UTC+9:30) Adelaide, Darwin</option>
                    <option value="Australia/Sydney">(UTC+10) Brisbane, Melbourne, Sydney, Guam</option>
                    <option value="Asia/Magadan">(UTC+11) Magadan, Solomon Is., New Caledonia</option>
                    <option value="Pacific/Auckland">(UTC+12) Fiji, Kamchatka, Marshall Is., Wellington</option>
                </select>
                <script>
                    $('#timezone option').each(function (i,v) {
                        if ($(this).val()=='{{auth()->user()->timezone}}'){
                            $(this).attr('selected','selected');
                        }
                    });
                </script>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end mt-2">
            <input type="submit" class="btn btn-danger c-bg">
        </div>
    </form>
</div>
<script>
    $(function () {
        $("#account-form").on('submit', (function (e) {
            e.preventDefault();
            var button = $(this).find('input[type="submit"],button');
            var previous = $(button).html();
            button.attr('disabled', 'disabled').html('Processing');


            $(this).find('.form-control.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback.is-invalid').remove();




            var alert=$(this).find('.alert');
            alert.hide();

            $.ajax({
                url: "{{route('settings.account.update')}}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    button.attr('disabled', null).html(previous);

                    alert.find('.message').html(data.success);
                    alert.css('display','flex');


                },
                error: function (xhr) {
                    button.attr('disabled', null).html(previous);
                    erroralert(xhr);
                }
            });
        }));
    });
</script>
