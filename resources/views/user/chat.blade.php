@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <form id="search-form">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="&#xF002; Search or start chat here.." id="search">
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-unstyled components pt-4">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header d-flex">
                            <img src="" id="header-to-img" class="mt-1 ml-2">
                            <h6 class="font-weight-bold mt-3" id="header-to-h5">Chat</h6>
                        </div>
                        <div class="card-body p-0 message-box-cover">
                            <div class="message-box nav-pills-bg">
                                <div class="d-flex justify-content-center align-items-center" style="height: 100%">
                                    <div>
                                        <h1>Welcome to Girlfriend Vibez Chat Box</h1>
                                        <p>Get connected with your loved ones.</p>
                                    </div>

                                </div>
                            </div>
                            <div class="input-group">
                                <input type="hidden" name="to" id="to">
                                <input type="text"
                                       class="form-control border-radius-0 border-left-0 border-right-0 border-bottom"
                                       name="message" id="message" placeholder="Type your message here..">
                                <div class="input-group-append">
                                    <button class="btn btn-danger c-bg btn-msg-send" id="btn-msg-send"
                                            type="button"><i class="bi bi-send"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        var onetimechatopen = true;
        @if($id)
            onetimechatopen = true;
        @else
            onetimechatopen = false;
        @endif
        function search(search) {
            //event.preventDefault();
            $.ajax({
                url: "{{route('chat.fetch.user.list')}}",
                type: "POST",
                data: {'search': search, _token: '{{csrf_token()}}'},
                dataType: "JSON",
                beforeSend: function () {
                    $('.list-unstyled').empty();
                    $('.list-unstyled').append('<center><img src="{{url('user/lazy-loader.gif')}}" class="lazy-loader"/></center>');
                    $('.lazy-loader').show();
                },
                success: function (data) {

                    $('.list-unstyled').empty();
                    $.each(data, function (i, v) {
                        var unread='';
                        console.log(v['unread']);
                        if (v['unread']>0){
                            unread='<span class="label-primary">'+v['unread']+'</span>'
                        }
                        $('.list-unstyled').append('<li class="user-of-chat-list" data-id="' + v['id'] + '">' +
                            '<a href="#" id="chat-list-items"><img src="'+v['src']+'" class="profile-chat" alt="">' +
                            '<span id="full-name">'+v['name']+'</span><small class="text-muted">'+v['last_login']+'</small>'+unread+'</a>' +
                            '</li>');
                    });
                    if (onetimechatopen) {
                        var user_to_chat = $('.user-of-chat-list[data-id="{{$id}}"]');
                        user_to_chat.trigger('click');
                        onetimechatopen = false;
                    }
                },
                error: function (xhr) {
                }
            });

        }

        $(document).ready(function () {

            search();
            $('#sidebarCollapse').on('click', function () {
                $('#sidebarCollapse').find("i").toggleClass("icon-arrow-left icon-arrow-right");
                $('#sidebar').toggleClass('active');
            });
            $('.message-box').on('click', function () {
                if (window.matchMedia('(max-width: 400px)').matches) {
                    $('#sidebarCollapse').find("i").toggleClass("icon-arrow-left icon-arrow-right");
                    $('#sidebar').toggleClass('active');
                }
            });

            $('#search').on("input", function () {
                search($('#search').val());
            });
            $('.btn-msg-send').on("click", function () {
                var message = $('#message').val();
                var to = $('#to').val();

                var time = new Date();
                $('.message-box').append('<div class="col-12 p-0 text-right"><p class="message-pills message-pills-right">'+message+' <small>'+time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })+'</small></p></div>');

                $('#message').val(null).focus();



                var btn=$(this),previous=$(btn).html();
                if (message){
                    $.ajax({
                        url: "{{route('chat.store')}}",
                        type: "POST",
                        data: {'message': message, 'to': to, _token: '{{csrf_token()}}'},
                        dataType: "JSON",
                        beforeSend: function () {
                            btn.html('...');
                        },
                        complete: function () {
                            btn.html(previous);
                        },
                        success: function (data) {

                            scrollbottom();
                        },
                        error: function (xhr) {
                        }
                    });
                }
            });

            $(document).on('click', '.user-of-chat-list', function (e) {
                $('.user-of-chat-list').removeClass('active');
                $(this).addClass('active');
                if (window.matchMedia('(max-width: 400px)').matches) {
                    e.preventDefault();
                    $('#sidebar').toggleClass('active');
                }
                $(this).addClass('active').siblings().removeClass('active');
                var id = $(this).attr('data-id');
                var name = $(this).find('#full-name');

                $('#header-to-img').attr('src', $(this).find('img').attr('src')).addClass('profile-header');
                $('#header-to-h5').text(name.text());
                $('.message-box').removeClass('nav-pills-bg').addClass('nav-pills-no-bg');
                $('#to').val(id);
                getMessages(id);
                scrollbottom();
                $('#message').focus();
            });


            var input = document.getElementById("message");
            input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    if ($('#message').val()!=''){
                        document.getElementById("btn-msg-send").click();
                    }
                }
            });

        });
        function getMessages(user) {
            $.ajax({
                url: "{{route('chat.fetch.user.messages')}}",
                type: "POST",
                data: {'user': user, _token: '{{csrf_token()}}'},
                dataType: "JSON",
                beforeSend: function () {
                    $('.message-box').empty();
                    $('.message-box').append('<center><img src="{{url('user/lazy-loader.gif')}}" class="lazy-loader"/></center>');
                },
                success: function (data) {
                    $('.message-box').empty();
                    $.each(data, function (i, v) {
                        $('.message-box').append('<div class="col-12 p-0 message-pills-date"> <p class="message-pills"><small><b>'+i+'</b></small></p> </div>');
                        $.each(v, function (ni, nv) {
                            var textp=(nv['left']==false)?'text-left':'text-right';
                            var position=(nv['left']==false)?'message-pills-left':'message-pills-right';
                            $('.message-box').append('<div class="col-12 p-0 '+textp+'"><p class="message-pills '+position+' ">'+nv['message']+' <small>'+nv['time']+'</small></p></div>');
                        });
                    });
                },
            });
        }

        function scrollbottom() {
            $('.message-box').animate({
                scrollTop: $('.message-box').height()*1000
            }, 1000);
        }
    </script>
    <style>
        .email-card .nav-pills > li .nav-link {
            width: fit-content;
            min-width: fit-content;
        }

        .email-card .nav-pills > li .nav-link.active{
            font-weight: 600;
            margin-top: 3px;
            background: rgba(73, 182, 255, 0.25);
            color: #0656b2;
            border-color: rgba(73, 182, 255, 0.5);
        }

        .email-card .nav-pills > li .nav-link.from{
            border-radius: 20px 0 0 20px ;
            text-transform: none;
        }
        .email-card .nav-pills > li .nav-link.to{
            border-radius:0 20px 20px 0  ;
            background:rgba(0 ,0, 0 , 0.05);
            border-color:rgba(0 ,0, 0 , 0.1);
            text-transform: none;
        }

        #wrapper {
            align-items: flex-start;
            border: 1px solid green;
            overflow: hidden;
        }
        #sidebar-wrapper {
            min-height: 100%;
            margin-left: -15rem;
            transition: margin 0.25s ease-out;
        }
        .chat-room{
            height: calc(100% - 50px);
        }
        .chat-list-user{
            height: 100%;
            overflow-y: scroll;
        }
        .chat-list-user::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        .chat-list-user::-webkit-scrollbar
        {
            width: 5px;
            background-color: #F5F5F5;
        }

        .chat-list-user::-webkit-scrollbar-thumb
        {
            background-color: #3f6fc4;
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
        }
        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            width: 100%;
            min-width: 100%;
        }
        body.sb-sidenav-toggled #wrapper #sidebar-wrapper {
            margin-left: 0;
        }


        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            body.sb-sidenav-toggled #wrapper #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
        .pcoded-content {
            padding: 0;
        }
        textarea:focus,
        textarea.form-control:focus,
        input.form-control:focus,
        input[type=text]:focus,
        [type=text].form-control:focus,
        [contenteditable].form-control:focus {
            box-shadow: inset 0 -1px 0 #ddd;
        }
        .btn-toggle,.btn-toggle:active,.btn-toggle:focus{
            border: none;
            outline: none;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0);
        }
        .nav-pills{
            height: inherit;
            overflow-y: scroll;
        }
        .nav-pills-bg{
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .nav-pills-no-bg{
            background:transparent;
        }
        @media (max-width: 400px) {
            .nav-pills-bg{
                background-position: center;
                background-repeat: no-repeat;
                background-size: auto 600px;
            }
        }


        .profile-chat{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
        .profile-header{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
        .mail-section{
            width: 100%;
            align-self: flex-start;
        }
        .chat-header{
            font-family:Arial, FontAwesome;
            height: 50px;
        }
        .btn-msg-send,.btn-msg-send:hover,.btn-msg-send:focus,.btn-msg-send:active,.btn-msg-send:link,.btn-msg-send:visited{
            border: none;
            outline: none;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0);
            background-color: #ec6d70;
            background-image: linear-gradient(rgba(255,255,255,.2), #ec6d70, rgba(255,255,255,.1));
        }
        .card-footer{
            align-items: flex-start;
            padding-bottom: 0;
        }
        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            transition: all 0.3s;
        }
        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
        }
        #sidebar ul.components {
            height: 80vh;
            background: white;
            overflow-y: scroll;
        }
        #sidebar ul li a {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            background: #eaeaea;
        }
        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: black;
            background: #eaeaea;
        }
        a[data-toggle="collapse"] {
            position: relative;
        }
        #sidebar ul.components::-webkit-scrollbar-track,.message-box::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        #sidebar ul.components::-webkit-scrollbar,.message-box::-webkit-scrollbar
        {
            width: 5px;
            background-color: #F5F5F5;
        }

        #sidebar ul.components::-webkit-scrollbar-thumb,.message-box::-webkit-scrollbar-thumb
        {
            background-color: #3f6fc4;
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
        }
        a,
        a:hover,
        a:focus {
            color: black;
            text-decoration: none;
            transition: all 0.3s;
        }
        .chat-header{
            width: calc( 100%);
        }
        .style-toggler{
            display: none;
        }
        .message-pills{
            font-weight: 600;
            display:inline-block;
            color: #0656b2;
            padding: 10px;
        }
        .message-pills-left{
            border-radius:0 20px 20px 0  ;
            background:rgba(0 ,0, 0 , 0.05);
            border-color:rgba(0 ,0, 0 , 0.1);
            padding-right: 20px;
        }
        .message-pills-right{
            border-radius:20px 0 0 20px;
            background:rgba(0 ,0, 0 , 0.05);
            border-color:rgba(0 ,0, 0 , 0.1);
            padding-left: 20px;
        }
        .message-pills-date{
            align-items: center;
            text-align: center;
        }
        .message-box{
            background-color: white;
            height: calc( 80vh - calc(1.5em + 0.75rem + 2px) );
            overflow-y: scroll;
        }
        .lazy-loader{
            margin-top: 40px;
            width: 30px;
        }
        .badge-dark{
            border-radius: 50%;
            background-color: #3f6fc4;
            background-image: linear-gradient(rgba(255,255,255,.2), #3f6fc4, rgba(255,255,255,.1));
        }
        .status-active {
            top: 8px;
            left:30px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #2ed8b6;
            z-index: 2;
        }
        .status-inactive {
            top: 8px;
            left:30px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(156, 156, 156, 0.8);
            z-index: 2;
        }
        #full-name{
            left: 50px;
        }
        li.user-of-chat-list {
            padding: 5px 10px;
        }
        li.user-of-chat-list.active {
            background: #f1f1f1;
        }
        .text-right{
            text-align: right;
        }
        span.label-primary {
            text-align: right;
            float: right;
            background: black;
            color: white;
            border-radius: 10px;
            padding: 0px 8px;
        }
        
    </style>
@endsection