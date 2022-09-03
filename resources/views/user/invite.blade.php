@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="card-header">
                        <h4 class="c-color">Invite Your Friends</h4>
                    </div>
                    <div class="card-body">
                        Invite your friends to join! Enter up to 10 email addresses separated by commas in the recipients box below. If your friends decide to sign up, a friend request from you will be waiting for them when they first sign in.
                    </div>
                    <div class="card-body">
                        <form id="send_invite" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="recipients font-weight-bold">Recipients</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="recipients" rows="5" name="recipients"></textarea>
                                    <label for="recipients">Comma-separated list, or one-email-per-line.</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="message font-weight-bold">Custom Message</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="message" rows="5" name="message">Hi there, You are being invited to join the largest, women-only social network for female friendship -  Girlfriend Social. You can create a free profile and meet lots of new girl pals in your local area.</textarea>
                                </div>
                            </div>
                            <div class="form-group row d-none">
                                <label class="form-check-label offset-md-3" id="send_request">
                                    <input type="checkbox" class="form-check-input" id="send_request" name="send_request">Send friend a request if the user(s) join(s) the network
                                </label>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" id="send-invite-btn" class="btn btn-success mt-2"> Send Invites</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(function () {
            $(document).on('submit', '#send_invite', function (e) {
                e.preventDefault();
                var button = $(this).find('button[type=submit]'), previous = button.html();
                button.attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing ...');

                $.ajax({
                    type: "POST",
                    url: "{{route('invite.submit')}}",
                    data: new FormData(this),
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        button.attr('disabled', null).html(previous);
                        $.toast({heading: 'Success', text:data.success, icon: 'success', position: 'top-right'});
                    },
                    error: function (xhr) {
                        button.attr('disabled', null).html(previous);
                        erroralert(xhr);
                    }
                });
            });
        });
    </script>
@endsection