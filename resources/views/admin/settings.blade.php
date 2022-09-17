@extends('admin.layouts.master')
@section('content')
    @php $url=str_replace('index','',Route::currentRouteName()); @endphp

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">{{ucfirst($type)}}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('a.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ucfirst($type)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach($slugs as $slug)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-success shadow-sm float-right edit"
                                data-slug="{{$slug}}"><i class="fa fa-plus-circle"></i> {{getTitleFromSlug($slug)}}
                        </button>
                    </div>
                    @if($settings[$slug]->value)
                        <div class="card-body">
                            {!! $settings[$slug]->value !!}
                        </div>
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Update Form</h4>
                    <h4 style="cursor: pointer" class="float-right" onclick="$('#modal').modal('hide')">
                        <i class="fa fa-times-circle"></i>
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="form" id="add_form" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div id="form-data"></div>
                        <textarea rows="10" class="form-control" name="value" id="edit_value"></textarea>

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
            $(document).on('click', '.edit', function () {
                var slug = $(this).attr('data-slug');
                $.ajax({
                    "url": "{{route($url.'edit')}}",
                    type: "POST",
                    data: {'slug': slug, _token: '{{csrf_token()}}'},
                    dataType: "json",
                    success: function (data) {
                        $('#modal').modal('toggle');
                        $('#form-data').html(data);
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
                            location.reload();
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
                var route = "{{route($url.'destroy')}}";
                deleted(id, token, route);
            });
        });

        $('#edit_value').summernote({
            /*dialogsInBody: true,*/
            /*airMode: true,*/
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
