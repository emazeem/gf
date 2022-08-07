function deleted(id,token,route){
    swal({
        title: "Are you sure to delete?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: route,
                type: 'POST',
                dataType: "JSON",
                data: {'id':id,_token:token},
                success: function (data) {
                    swal('success', data.success, 'success').then((value) => {
                        InitTable();
                    });
                },
                error: function (xhr) {
                    erroralert(xhr)
                },
            });

        }
    });

}
function erroralert(xhr){
    if (typeof  xhr.responseJSON.errors === 'object'){
        var error = '';
        $.each(xhr.responseJSON.errors, function (key, item) {
            error += item;
        });
        swal("Failed", error, "error");
    }else{
        swal("Failed", xhr.responseJSON.message, "error");
    }
}
$(function () {
    $('.add').click(function () {
        $('#modal').modal('show');
        $('#edit_id').val(0);
    });
});