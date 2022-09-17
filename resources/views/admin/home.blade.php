@extends('admin.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Home Page</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-primary shadow-sm float-right add"><i
                                    class="fa fa-plus-circle"></i> Home Page
                        </button>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-bordered table-hover display nowrap bg-white"
                               width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Home Page</h4>
                    <h4 style="cursor: pointer" class="float-right" onclick="$('#modal').modal('hide')">
                        <i class="fa fa-times-circle"></i>
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="form" id="add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="edit_name" class="control-label">Title</label>
                            <input type="text" class="form-control" name="name" id="edit_name">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="form-check-label" name="type" id="edit_type">
                            <label for="edit_type" class="form-check-label">If Image</label>
                        </div>

                        <div class="form-group" id="value-text">
                            <label for="edit_value" class="control-label">Value</label>
                            <textarea class="form-control" name=value id="edit_value" rows="5"></textarea>
                        </div>
                        <div class="form-group" id="value-image" style="display: none;">
                            <label for="edit_image" class="control-label">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="value" id="edit_image">
                                <label class="custom-file-label" for="value">Image (opt)</label>
                            </div>

                        </div>
                        <input type="hidden" name="page" id="page" value="">
                        <input type="hidden" name="id" id="edit_id" value="0">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="add_form_btn" value="Save">
                </div>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var columns = [
                {"data": "id"},
                {"data": "name"},
                {"data": "value"},
                {"data": "options", "orderable": false},
            ];
            function InitTable(columns, token) {
                $('#example').DataTable({
                    responsive: true,
                    "bDestroy": true,
                    "processing": true,
                    "serverSide": true,
                    "Paginate": true,
                    "order": [[0, 'asc']],
                    "pageLength": 25,
                    "ajax": {
                        "url": '{{ route('settings.fetch')}}',
                        "dataType": "json",
                        "type": "POST",
                        "data": {_token: token, page: '{{$page}}'}
                    },
                    "columns": columns
                });
            }
            InitTable(columns, '{{csrf_token()}}');

            $(document).on('click', '.edit', function () {

                var id = $(this).attr('data-id');
                $.ajax({
                    "url": "{{route('settings.edit')}}",
                    type: "POST",
                    data: {'id': id, _token: '{{csrf_token()}}'},
                    dataType: "json",
                    success: function (data) {
                        $('#modal').modal('toggle');
                        $('#edit_id').val(data.id);
                        $('#edit_name').val(data.name);
                        CKEDITOR.instances['value'].setData(data.value);

                    }
                });
            });
            $("#add_form").on('submit', (function (e) {
                for (instance in CKEDITOR.instances) {
                    $('#' + instance).val(CKEDITOR.instances[instance].getData());
                }
                e.preventDefault();
                var button = $('#add_form_btn');
                var previous = $(button).html();
                button.attr('disabled', 'disabled').html('Processing..');
                $.ajax({
                    url: "{{route('settings.store')}}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {

                        button.attr('disabled', null).html(previous);
                        swal('success', data.success, 'success').then((value) => {
                            $('#modal').modal('hide');
                            InitTable(columns, '{{csrf_token()}}');
                        });

                    },
                    error: function (xhr) {
                        button.attr('disabled', null).html(previous);
                        if (typeof  xhr.responseJSON.errors === 'object') {
                            var error = '';
                            $.each(xhr.responseJSON.errors, function (key, item) {
                                error += item;
                            });
                            swal("Failed", error, "error");
                        } else {
                            swal("Failed", xhr.responseJSON.message, "error");
                        }
                    }
                });
            }));
            $(document).on('click', '.delete', function (e) {
                var id = $(this).attr('data-id');
                var token = '{{csrf_token()}}';
                var route = "{{route('sliders.destroy')}}";
                deleted(id, token, route);
                InitTable(columns, '{{csrf_token()}}');
            });
            $('#edit_type').change(function() {
                if(this.checked) {
                    $('#value-image').show();
                    $('#value-text').hide();
                }else{
                    $('#value-image').hide();
                    $('#value-text').show();
                }
            });


            CKEDITOR.replace('value', {
                skin: 'moono',
                enterMode: CKEDITOR.ENTER_BR,
                shiftEnterMode:CKEDITOR.ENTER_P,
                toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
                    { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                    { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
                    { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                    { name: 'links', items: [ 'Link', 'Unlink' ] },
                    { name: 'insert', items: [ 'Image'] },
                    { name: 'spell', items: [ 'jQuerySpellChecker' ] },
                    { name: 'table', items: [ 'Table' ] }
                ],
            });

        });
    </script>
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

@endsection
