<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index($type){
        if ($type=='homepage'){
            $slugs=[
                'homepage-section-1',
                'homepage-section-2',
                'homepage-section-3',
            ];
        }
        $settings=[];
        foreach ($slugs as $slug){
            $setting=Setting::where('slug',$slug)->first();
            if (!$setting){
                $setting=new Setting();
            }
            $settings[$slug]=$setting;
        }
        return view('admin.settings',compact('settings','slugs','type'));
    }
    public function store(Request $request){
        $this->validate(\request(),[
            'value' =>'required_without:image',
            'image' =>'required_without:value',
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
        $data->slug = $request->slug;
        $data->title = getTitleFromSlug($request->slug);
        $data->value = $request->value;
        if (isset($request->image)) {
            $attachment = time() . $request->image->getClientOriginalName();
            Storage::disk('local')->put('/public/setting/' . $attachment, File::get($request->image));
            $data->image = $attachment;
        }
        $data->save();
        return response()->json(['success'=>$message]);
    }
    public function edit(Request $request){
        $update=Setting::where('slug',$request->slug)->first();
        
        if (!$update){$update=new Setting();}
        $title=getTitleFromSlug($request->slug);
        $slug=$request->slug;
        $HTML='         <div class="form-group">
                            <label for="edit_name" class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name" value="'.$title.'" disabled>
                        </div>
                        <div class="form-group">
                            <label for="edit_value" class="control-label">Enter Details of '.$title.' (if any)</label>
                        </div>
                        <input type="hidden" name="slug" id="edit_slug" value="'.$slug.'">
                        <input type="hidden" name="id" id="edit_id" value="'.($update?$update->id:'0').'">';


        return response()->json($HTML);
    }
}
