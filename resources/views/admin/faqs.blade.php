@extends('admin.layouts.master')
@section('content')
    @php $url=str_replace('index','',Route::currentRouteName()); @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Faqs</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('a.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Faqs</li>
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
                        <button type="button" class="btn btn-sm btn-primary shadow-sm float-right add" ><i class="fa fa-plus-circle"></i> Faqs</button>
                    </div>
                    <div class="card-body" style="overflow-y: scroll">
                        <table id="example" class="table table-bordered table-hover display nowrap bg-white" width="100%">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Category</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>

                            </tr>
                            </tfoot>
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
                    <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Faqs</h4>
                    <h4 style="cursor: pointer" class="float-right" onclick="$('#modal').modal('hide')">
                        <i class="fa fa-times-circle"></i>
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="form" id="add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="edit_category_id" class="control-label">Category</label>
                            <select class="form-control" name="category_id" id="edit_category_id">
                                <option hidden>-- Select a category</option>
                                @foreach(\App\Models\FaqCategory::all() as $catgeory)
                                    <option value="{{$catgeory->id}}">{{$catgeory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_question" class="control-label">Question</label>
                            <input type="text" class="form-control" name="question" id="edit_question">
                        </div>

                        <div class="form-group">
                            <label for="edit_answer" class="control-label">Answer</label>
                            <textarea class="form-control" name="answer" id="edit_answer"></textarea>
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
                    "url": '{{ route('a.faq.fetch')}}',
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: '{{csrf_token()}}'}
                },
                "columns": [
                    {"data": "category"},
                    {"data": "question"},
                    {"data": "answer"},
                    {"data": "options", "orderable": false},
                ]
            });
        }
        $(document).ready(function () {
            InitTable();
            $(document).on('click', '.edit', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    "url": "{{route($url.'edit')}}",
                    type: "POST",
                    data: {'id': id, _token: '{{csrf_token()}}'},
                    dataType: "json",
                    success: function (data) {
                        $('#modal').modal('toggle');
                        $('#edit_id').val(data.id);
                        $('#category_id').val(data.category_id);
                        $('#edit_question').val(data.question);
                        $('#edit_answer').val(data.answer);
                    }
                });
            });
            $("#add_form").on('submit', (function (e) {
                e.preventDefault();
                var button = $('#add_form_btn');
                var previous = $(button).html();
                button.attr('disabled', 'disabled').html('Processing..');
                $.ajax({
                    url: "{{route($url.'store')}}",
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
                        erroralert(xhr);
                    }
                });
            }));
            $(document).on('click', '.delete', function (e) {
                var id = $(this).attr('data-id');
                var token = '{{csrf_token()}}';
                var route="{{route($url.'destroy')}}";
                deleted(id,token,route);
            });
        });
    </script>
@endsection