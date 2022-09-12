@extends('admin.layouts.master')
@section('content')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-5">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <!-- column -->
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4><i class="fa fa-user"></i>  All GFV Users </h4>
                    <h1>{{\App\Models\User::where('role','user')->get()->count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4><i class="fa fa-user-plus"></i>  Active GFV Users </h4>
                    <h1>{{\App\Models\User::where('role','user')->where('status','active')->get()->count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4><i class="fa fa-user-times"></i>  Deleted GFV Users </h4>
                    <h1>{{\App\Models\User::where('role','user')->where('status','delete')->get()->count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-12 table-responsive">
            <div class="d-flex" style="justify-content: space-between">
                <h4>Users Joined this month ({{date('M, y')}})</h4>
                <a href="{{route('a.user.index')}}">Show all</a>
            </div>
            <table class="table table-sm table-bordered bg-white">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Last login</th>
                    <th><i class="fa fa-eye"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\User::whereDate('created_at','>=',date('Y-m-01'))->where('role','user')->get() as $user)
                    <tr>
                        <td><img src="{{$user->details->profile_image()}}" width="30" style="border-radius: 50%" alt=""> {{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->last_login}}</td>
                        <td><a href="{{route('a.user.show',[$user->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 table-responsive">
            <div class="d-flex" style="justify-content: space-between">
                <h4>Last 5 reports ({{date('M, y')}})</h4>
                <a href="{{route('a.report.index')}}">Show all</a>
            </div>
            <table class="table table-sm table-bordered bg-white">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Report By</th>
                    <th>Report From</th>
                    <th>Type</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th><i class="fa fa-eye"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Report::orderBy('created_at','DESC')->take(5)->get() as $report)
                    <tr>
                        <td>{{$report->id()}}</td>
                        <td><img src="{{$report->fromUser->details->profile_image()}}" width="30" style="border-radius: 50%" alt=""> {{$report->fromUser->name}}</td>
                        <td><img src="{{$report->toUser->details->profile_image()}}" width="30" style="border-radius: 50%" alt=""> {{$report->toUser->name}}</td>
                        <td>{{$report->type}}</td>
                        <td>{{$report->description}}</td>
                        <td>{{$report->status()}}</td>
                        <td><a href="{{route('a.report.show',[$report->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


</div>
@endsection