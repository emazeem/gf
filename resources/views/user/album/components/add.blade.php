

<div class="col-md-12">
    <h4>Add New Photos</h4>
    <p>Choose photos on your computer to add to your profile.</p>
    <p>Click "Add Photos" to select one or more photos from your computer. After you have selected the photos, they will begin to upload right away. When your upload is finished, click the button below your photo list to save them to your album.</p>
    Add Photos
    <form action="{{route('user.album.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <div class="col-md-6">
                <input type="text" name="tit">
            </div>
        </div>
    </form>
</div>