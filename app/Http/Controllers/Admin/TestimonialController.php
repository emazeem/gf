<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    //
    public function index(){
        return view('admin.testimonials');
    }
    public function fetch(){
        $data=Testimonial::all();
        return DataTables::of($data)
            ->addColumn('id', function ($data) {
                return $data->id;
            })
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('feedback', function ($data) {
                return $data->feedback;
            })
            ->addColumn('profile', function ($data) {
                return "<img src='{$data->profile()}' width='100'>";
            })
            ->addColumn('options', function ($data) {
                $action="<button type='button' title='Edit' class='btn edit btn-sm btn-success' data-toggle='modal' data-id='" . $data->id . "'><i class='fa fa-edit'></i></button>";
                $action.="<button type='button' title='Delete' class='btn delete btn-sm btn-danger' data-id='" . $data->id . "'><i class='fa fa-trash'></i></button>";
                return $action;
            })
            ->rawColumns(['options','profile'])
            ->make(true);

    }

    public function store(Request $request){
        $this->validate(\request(),[
            'name' =>'required',
            'feedback' =>'required',
        ],[
            'name.required'=>'Name field is required * ',
            'feedback.required'=>'Feedback field is required * ',
        ]);
        if ($request->id==0){
            $data = new Testimonial();
            $message='Added successfully!';
        }else{
            $data =Testimonial::find($request->id);
            $message='Updated successfully!';
        }
        $data->name = $request->name;
        $data->feedback = $request->feedback;
        if (isset($request->profile)) {
            $attachment = time() . $request->profile->getClientOriginalName();
            Storage::disk('local')->put('/public/testimonial/profile/' . $attachment, File::get($request->profile));
            $data->profile = $attachment;
        }
        $data->save();
        return response()->json(['success'=>$message]);
    }
    public function edit(Request $request){
        $update=Testimonial::find($request->id);
        return response()->json($update);
    }
    public function destroy(Request $request){
        Testimonial::find($request->id)->delete();
        return response()->json(['success'=>'Deleted successfully!']);
    }
}
