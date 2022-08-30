
<div class="col-md-12">
    <h4 class="c-color mt-4">Add New Photos</h4>
    <p>Choose photos on your computer to add to your profile.</p>
    <p>Click "Add Photos" to select one or more photos from your computer. After you have selected the photos, they will begin to upload right away. When your upload is finished, click the button below your photo list to save them to your album.</p>
    <form action="{{route('user.album.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="text-danger">{{$error}}</div>
            @endforeach
        @endif
        @if(Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif
        @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <div class="col-md-6">
                <input type="text" id="title" name="title" class="form-control" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="caption">Caption</label>
            <div class="col-md-6">
                <input type="text" id="caption" name="caption" class="form-control" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="image">Photo</label>
            <div class="col-md-6">
                <input type="file" id="image" name="image" class="form-control">
            </div>
        </div>
        <div class="form-group mt-3 text-center">
            <button type="submit" class="btn btn-sm btn-danger">Save Changes</button>
        </div>
    </form>
</div>