<div class="col-md-12 mt-md-5">
    @if(Session::has('success'))
        <p class="alert alert-danger">{{ Session::get('success') }}</p>
    @endif
    <div class="card">
        <div class="card-body">
            <h4 class="c-color">Notification Settings</h4>
            Which of the these do you want to receive email alerts about?

            <form action="{{route('settings.disable.account')}}" method="post">
                @csrf



                Match system


                <h4>General</h4>
                <div style="padding-left: 20px">
                    <label class="form-check-label col-12" id="email-notification">
                        <input type="checkbox" class="form-check-input" id="email-notification" name="email-notification"
                               value="accept-my-friend-request">When someone accepts my friend request.</label>
                    <label class="form-check-label col-12" id="email-notification">
                        <input type="checkbox" class="form-check-input" id="email-notification" name="email-notification"
                               value="receive-friend-request">When I receive a friend request.</label>
                    <label class="form-check-label col-12" id="email-notification">
                        <input type="checkbox" class="form-check-input" id="email-notification" name="email-notification"
                               value="receive-message">When I receive a message.</label>

                </div>
                 <h4>Match System</h4>
                <div style="padding-left: 20px">

                    <label class="form-check-label col-12" id="email-notification">
                        <input type="checkbox" class="form-check-input" id="email-notification" name="email-notification"
                               value="receive-match">When A User sends you a match</label>

                    <label class="form-check-label col-12" id="email-notification">
                        <input type="checkbox" class="form-check-input" id="email-notification" name="email-notification"
                               value="mutual-match">When you Mutual Match with a User</label>
                </div>

                <div class="col-md-8 d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger c-bg">Save Changes</button>
                </div>

            </form>
        </div>
    </div>
</div>
