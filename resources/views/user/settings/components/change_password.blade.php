<div class="col-md-12 mt-md-5">
    <h4 class="c-color">Change Password</h4>
    <form class="form-horizontal" id="form" method="post" autocomplete="off">
        @csrf
        <div class="alert alert-success alert-dismissible fade show justify-content-between" role="alert" style="display: none;">
            <strong>Success!</strong> <span class="message"></span>
            <span onclick="$('.alert').css('display','none')">
            <i class="bi bi-x-circle"></i>
            </span>
        </div>



        <div class="form-group">
            <label for="oldpassword" class="text-xs control-label">Old Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" id="oldpassword" name="oldpassword"
                       placeholder="Old Password">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label ">{{ __('New Password') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" placeholder="New Password">
            </div>
        </div>
        <div class="form-group">
            <label for="password-confirm" class="col-form-label ">{{ __('Confirm Password') }}</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                       placeholder="Confirm New Password">
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end mt-2">
            <input type="submit" class="btn btn-danger c-bg">
        </div>
    </form>
</div>
<script>
    $(function () {
        $("#form").on('submit', (function (e) {
            e.preventDefault();
            var button = $(this).find('input[type="submit"],button');
            var previous = $(button).html();
            button.attr('disabled', 'disabled').html('Processing');


            $(this).find('.form-control.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback.is-invalid').remove();




            var alert=$(this).find('.alert');
            alert.hide();

            $.ajax({
                url: "{{route('settings.change.password.update')}}",
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
