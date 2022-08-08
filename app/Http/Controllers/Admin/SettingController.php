<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SettingController extends Controller
{
    public function index($slug){

        $setting=Setting::where('slug',$slug)->first();
        if (!$setting){
            $setting=new Setting();
        }
        return view('admin.settings',compact('slug','setting'));
    }
    public function fetch(){
        $data=Setting::all();
    }
    public function store(Request $request){
        $this->validate(\request(),[
            'value' =>'required',
        ],[
            'value.required'=>'Value field is required * ',
        ]);
        if ($request->id==0 || $request->id==null){
            $data = new Setting();
            $message='Added successfully!';
        }else{
            $data =Setting::find($request->id);
            $message='Updated successfully!';
        }
        $data->type = 0;
        $data->slug = $request->slug;
        $data->title = getTitleFromSlug($request->slug);
        $data->value = $request->value;
        if (isset($request->profile)) {
            $attachment = time() . $request->profile->getClientOriginalName();
            Storage::disk('local')->put('/public/testimonial/profile/' . $attachment, File::get($request->profile));
            $data->profile = $attachment;
        }
        $data->save();
        return response()->json(['success'=>$message]);
    }
    public function edit(Request $request){
        $update=Setting::where('slug',$request->slug)->first();
        if (!$update){$update=new Setting();}
        return response()->json($update);
    }
    public function destroy(Request $request){
        Testimonial::find($request->id)->delete();
        return response()->json(['success'=>'Deleted successfully!']);
    }
}
