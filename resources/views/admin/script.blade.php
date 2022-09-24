<script>
    function erroralert(xhr) {
        if (typeof  xhr.responseJSON.errors === 'object') {
            var error = '';
            $.each(xhr.responseJSON.errors, function (key, item) {
                error += item + '\n';
                if ($(document).find('[name="' + key + '"]').length) {
                    $(document).find('[name="' + key + '"]').addClass('is-invalid').after('<span class="invalid-feedback is-invalid">' + item + '</span>');
                } else {
                    var split = key.split('.');
                    $(document).find('#' + split[0] + '').addClass('is-invalid').after('<span class="invalid-feedback is-invalid">' + item + '</span>');

                }
            });
            //swal("Failed", error, "error");
        } else {
            alert(xhr.responseJSON.message);
        }
    }
</script>