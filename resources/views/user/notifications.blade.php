@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pt-4 pb-3">
                            <h4 class="c-color"><i class="bi bi-bell"></i> Notifications</h4>
                        </div>
                        <div class="card-body notifiction-body">
                            <ul class="notification-ul">
                                @foreach(auth()->user()->notifications as $notification)
                                    <li class="li-notification notification-li {{$notification->read_at?'':'unread'}}">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <img  src="{{NotificationFrom($notification->id)->details->profile_image()}}" width="40" height="40" style="" alt="">
                                                <p class="mt-2">{{$notification->data['msg']}} </p>
                                            </div>
                                            <div class="d-flex align-items-end">
                                                <div style="text-align: right">
                                                    <a data-id="{{$notification->id}}" data-url="{{$notification->data['url']}}" class="notification-mark-as-read">Show</a>
                                                    <a data-id="{{$notification->id}}" class="notification-delete"><i class="bi bi-trash"></i></a>
                                                    <p class="m-0 text-muted"><small>{{$notification->created_at->format('h:i A')}} {{$notification->created_at->format('d M,y')}}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        .notification-li {
            list-style-type: none;
            padding: 10px;
            background: white;
            border-bottom: 1px solid #dedede;
        }
        .notification-li.unread{
            background: #fafafa;
        }
        .notifiction-body{
            padding: 0;
        }
        .notification-ul{
            margin: 0;
            padding: 0;
        }
        .notification-mark-as-read{
            cursor: pointer;
        }
    </style>
@endsection