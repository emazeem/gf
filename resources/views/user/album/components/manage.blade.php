
<div class="col-md-12">
    <h4 class="c-color mt-4">{{auth()->user()->username}}'s Album: Profile Photos</h4>
    <p>Profile Photos</p>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif

        </div>
        @foreach(auth()->user()->album as $album)
            <div class="col-md-3">
                <div class="position-relative">
                    <span class="position-absolute text-danger" style="right: 0;bottom: 0;font-size: 20px">
                        <form action="{{route('user.album.delete')}}" id="delete{{$album->id}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$album->id}}" name="id">
                        </form>
                        <i class="bi bi-trash" onclick="$('#delete{{$album->id}}').submit()"></i>
                    </span>
                    <img src="{{Storage::disk('local')->url('/album/'.$album->image)}}" class="img-fluid" style="height: 200px" alt="">
                </div>
                <div>
                    <h5>
                        {{$album->title}}
                    </h5>
                    <h6>
                        {{$album->caption}}
                    </h6>
                    <p class="text-sm text-muted">
                        {{$album->created_at->format('d F,y h:i A')}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>