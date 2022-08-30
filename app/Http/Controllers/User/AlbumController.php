<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PhotoAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    //
    public function index(){
        return view('user.album.index');
    }
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'caption'=>'required',
            'image'=>'required',
        ]);
        $image=new PhotoAlbum();
        $image->user_id=auth()->user()->id;
        $image->title=$request->title;
        $image->caption=$request->caption;
        $attachment = time() . $request->image->getClientOriginalName();
        Storage::disk('local')->put('/public/album/' . $attachment, File::get($request->image));
        $image->image=$attachment;
        $image->save();
        return redirect()->back()->with('success','Photo added to your album.');

    }
    public function delete(Request $request){
        $image=PhotoAlbum::find($request->id);
        Storage::disk('local')->delete('public/album/'.$image->image);
        $image->delete();
        return redirect()->back()->with('success','Photo delete from your album.');
    }
}
