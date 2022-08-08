<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    //
    public function index(){
        return view('admin.blogs');
    }
    public function fetch(){
        $data=Blog::all();
        return DataTables::of($data)
            ->addColumn('id', function ($data) {
                return $data->id;
            })
            ->addColumn('title', function ($data) {
                return $data->title;
            })
            ->addColumn('description', function ($data) {
                return $data->description;
            })
            ->addColumn('profile', function ($data) {
                return "<img src=".$data->profile()." class='img-fluid' width='100'>";
            })
            ->addColumn('tags', function ($data) {
                return $data->tags;
            })
            ->addColumn('by', function ($data) {
                return $data->by;
            })
            ->addColumn('thumbnail', function ($data) {
                return "<img src=".$data->thumbnail()." class='img-fluid' width='100'>";
            })
            ->addColumn('options', function ($data) {
                $action="<button type='button' title='Edit' class='btn edit btn-sm btn-success' data-toggle='modal' data-id='" . $data->id . "'><i class='fa fa-edit'></i></button>";
                $action.="<button type='button' title='Delete' class='btn delete btn-sm btn-danger' data-id='" . $data->id . "'><i class='fa fa-trash'></i></button>";
                return $action;
            })
            ->rawColumns(['options','profile','thumbnail'])
            ->make(true);

    }
    public function store(Request $request){
        $this->validate(\request(),[
            'title' =>'required',
            'description' =>'required',
            'by' =>'required',
            'tags' =>'required',
        ],[
            'title.required'=>'Title field is required * ',
            'description.required'=>'Description field is required * ',
        ]);
        if ($request->id==0){
            $this->validate(\request(),[
                'thumbnail' =>'required',
                'profile' =>'required',
            ],[
                'thumbnail.required'=>'Thumbnail field is required * ',
                'profile.required'=>'Profile field is required * ',
            ]);
            $data = new Blog();
            $message='Added successfully!';
            $attachment = time() . $request->thumbnail->getClientOriginalName();
            Storage::disk('local')->put('/public/blog/thumbnail/' . $attachment, File::get($request->thumbnail));
            $data->thumbnail = $attachment;

            $attachment1= time() . $request->profile->getClientOriginalName();
            Storage::disk('local')->put('/public/blog/profile/' . $attachment1, File::get($request->profile));
            $data->profile = $attachment1;


        }else{
            $data =Blog::find($request->id);
            $message='Updated successfully!';
            if ($request->thumbnail){
                $attachment = time() . $request->thumbnail->getClientOriginalName();
                Storage::disk('local')->put('/public/blog/thumbnail/' . $attachment, File::get($request->thumbnail));
                $data->thumbnail = $attachment;
            }
            if ($request->profile){
                $attachment1= time() . $request->profile->getClientOriginalName();
                Storage::disk('local')->put('/public/blog/profile/' . $attachment1, File::get($request->profile));
                $data->profile = $attachment1;
            }
        }
        $data->title = $request->title;
        $data->description = $request->description;
        $data->by = $request->by;
        $data->tags = $request->tags;
        $data->save();
        return response()->json(['success'=>$message]);
    }
    public function edit(Request $request){
        $update=Blog::find($request->id);
        return response()->json($update);
    }
    public function destroy(Request $request){
        Blog::find($request->id)->delete();
        return response()->json(['success'=>'Deleted successfully!']);
    }

}
