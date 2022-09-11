@extends('admin.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @php $url=str_replace('index','',Route::currentRouteName()); @endphp
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Reports</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('a.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('a.report.index')}}">Report</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Report Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        @if($report->status==0)
                            <button class="btn btn-sm btn-success action float-right mb-2"><i class="fa fa-times-circle"></i> Close</button>
                        @endif
                        <table class="table table-sm table-striped table-bordered">
                            <tr>
                                <th>Report ID</th>
                                <td>{{$report->id()}}</td>
                            </tr>
                            <tr>
                                <th>From</th>
                                <td>{{$report->fromUser->name}} [{{$report->fromUser->username}}] [{{$report->fromUser->email}}]</td>
                            </tr>
                            <tr>
                                <th>To</th>
                                <td>{{$report->toUser->name}} [{{$report->toUser->username}}] [{{$report->toUser->email}}]
                                <br>
                                    @if($report->toUser->status!='delete')
                                    <form action="{{route('a.user.disable')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$report->to}}" name="id">
                                        <input type="hidden" value="delete" name="status">
                                        <button type="submit" class="btn btn-danger c-bg">Do you want to remove this user?</button>
                                    </form>
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Report Type</th>
                                <td>{{$report->type}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$report->status()}}</td>
                            </tr>

                            <tr>
                                <th>Report Description</th>
                                <td>{{$report->description}}</td>
                            </tr>
                            <tr>
                                <th>Report Date</th>
                                <td>{{$report->created_at->format('h:i A d F,y')}}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $(document).on('click', '.action', function () {
                swal({
                    title: "Are you sure to close this report?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '{{route('a.report.action')}}',
                            type: "POST",
                            dataType: "JSON",
                            data: {'id': '{{$report->id}}', _token: token},
                            success: function (data) {
                                swal('success', data.success, 'success').then((value) => {
                                    location.reload();
                                });
                            },
                            error: function (xhr) {
                                erroralert(xhr);
                            },
                        });
                    }
                });
            });
        });
    </script>
@endsection
