<div class="col-md-12 mt-md-5">
    <div class="card">
        <div class="card-body">
            <h4 class="c-color">We All Need A Break Sometimes</h4>
            Sometimes life gets busy and you don't have time to commit to making friends, instead of deleting your account, you can hide your profile and turn it back on when you have more time. Don't give up on friendship just because life is busy right now. Temporary disable your account instead!


            <form action="{{route('settings.disable.account')}}" method="post">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="id">
                <input type="hidden" value="disable" name="status">
                <button type="submit" class="btn btn-danger c-bg">I want to temporarily disable my account.</button>

            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="c-color">Are You Sure You Want To Delete?</h4>
            <hr>
            <h5 class="c-color">No</h5>
            <p>Please take me back to the main page. I don't want to delete!</p>
            <a class="btn btn-success " href="{{route('friend.show')}}">No- I still want to Make New Friends</a>
        </div>
        <div class="card-body">
            <h5 class="c-color">Yes</h5>
            <p>This is permanent. All message sent will immediately be deleted.</p>
            <form action="{{route('settings.disable.account')}}" method="post">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="id">
                <input type="hidden" value="delete" name="status">
                <button type="submit" class="btn btn-danger c-bg">Yes I still want to Delete my Account.</button>
            </form>
        </div>
    </div>




</div>
