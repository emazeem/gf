<div class="col-md-12 mt-md-5">
    <div class="card">
        <div class="card-body">
            <h4 class="c-color">Blocked Members</h4>
            <p>
                Adding a person to your block list makes your profile (and all of your other content) unviewable to them and vice-versa. Blocked users will not be able to message you or view things you post. Any connections you have to the blocked person will be canceled. To add someone to your block list, visit that person's profile page.
            </p>
            @foreach(\App\Models\Block::where('from',auth()->user()->id)->get() as $blocked)
            <form action="{{route('settings.block.remove')}}" method="post">
                @csrf
                <input type="hidden" value="{{$blocked->from}}" name="from">
                <input type="hidden" value="{{$blocked->to}}" name="to">
                <button type="submit" class="btn border border-danger"><span class="c-color">[ Unblock ]</span> </button>
                {{$blocked->toUser->username}}
            </form>
            @endforeach
        </div>
    </div>
</div>
