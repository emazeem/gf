@extends('admin.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Blog</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('a.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                        <button type="button" class="btn btn-sm btn-primary shadow-sm float-right add" ><i class="fa fa-plus-circle"></i> Blog</button>
                    </div>
                    <div class="card-body" style="overflow-x: scroll">
                        <table id="example" class="table table-bordered table-hover display nowrap bg-white" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Tags</th>
                                <th>By</th>
                                <th>Thumbnail</th>
                                <th>Profile</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Blog</h4>
                    <h4 style="cursor: pointer" class="float-right" onclick="$('#modal').modal('hide')">
                        <i class="fa fa-times-circle"></i>
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="form" id="add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="edit_title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="edit_title">
                        </div>

                        <div class="form-group">
                            <label for="edit_description" class="control-label">Description</label>
                            <textarea class="form-control" name=description id="edit_description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="edit_by" class="control-label">By</label>
                            <input type="text" class="form-control" name="by" id="edit_by">
                        </div>
                        <div class="form-group">
                            <label for="edit_tags" class="control-label">Tags</label>
                            <input type="text" class="form-control" name="tags" id="edit_tags">
                        </div>

                        <div class="form-group">
                            <label for="thumbnail" class="control-label">Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                                <label class="custom-file-label" for="thumbnail">Thumbnail</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profile" class="control-label">Profile</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="profile" id="profile">
                                <label class="custom-file-label" for="profile">Profile</label>
                            </div>
                        </div>

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
            function InitTable() {
                $('#example').DataTable({
                    responsive: true,
                    "bDestroy": true,
                    "processing": true,
                    "serverSide": true,
                    "Paginate": true,
                    "order": [[0, 'asc']],
                    "pageLength": 25,
                    "ajax": {
                        "url": '{{ route('a.blog.fetch')}}',
                        "dataType": "json",
                        "type": "POST",
                        "data": {_token: '{{csrf_token()}}'}
                    },
                    "columns": [
                        {"data": "id"},
                        {"data": "title"},
                        {"data": "description"},
                        {"data": "tags"},
                        {"data": "by"},
                        {"data": "thumbnail"},
                        {"data": "profile"},
                        {"data": "options", "orderable": false},
                    ]
                });
            }
            InitTable();
            $(document).on('click', '.edit', function () {

                var id = $(this).attr('data-id');
                $.ajax({
                    "url": "{{route('a.blog.edit')}}",
                    type: "POST",
                    data: {'id': id, _token: '{{csrf_token()}}'},
                    dataType: "json",
                    success: function (data) {
                        $('#modal').modal('toggle');
                        $('#edit_id').val(data.id);
                        $('#edit_title').val(data.title);
                        $('#edit_description').val(data.description);
                        $('#edit_by').val(data.by);
                        $('#edit_tags').val(data.tags);
                    }
                });
            });
            $("#add_form").on('submit', (function (e) {
                e.preventDefault();
                var button = $('#add_form_btn');
                var previous = $(button).html();
                button.attr('disabled', 'disabled').html('Processing..');
                $.ajax({
                    url: "{{route('a.blog.store')}}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {

                        button.attr('disabled', null).html(previous);
                        swal('success', data.success, 'success').then((value) => {
                            $('#modal').modal('hide');
                            InitTable();
                        });

                    },
                    error: function (xhr) {
                        button.attr('disabled', null).html(previous);
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
                });
            }));
            $(document).on('click', '.delete', function (e) {
                var id = $(this).attr('data-id');
                var token = '{{csrf_token()}}';
                var route="{{route('a.blog.destroy')}}";
                deleted(id,token,route);
            });
            $(document).on('click','.add',function () {
                $('#edit_id').val('');
                $('#modal').modal('show');
            });
        });
    </script>
@endsection