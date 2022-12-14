<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mockery\Matcher\Not;

class ProfileController extends Controller
{
    //
    public function welcome(){
        $users=User::where('id','!=',auth()->user()->id)->where('role','user')->get();
        return view('user.welcome',compact('users'));
    }
    public function invite(){
        return view('user.invite');
    }
    public function birthdays(){
        $users=User::where('role','user');
        $us=[];
        foreach ($users->get() as $u){
            if (date('m')==date('m',strtotime($u->details->dob))){
               $us[]=$u->id;
            }
        }
        $users=User::whereIn('id',$us)->get();
        return view('user.birthdays',compact('users'));
    }

    public function invite_submit(Request $request){
        $this->validate($request,[
           'recipients'=>'required',
           'message'=>'required',
        ]);
        foreach (explode(',',$request->recipients) as $recipient){
            sendEmail($recipient,'Invite',$request->message);
        }
        return response()->json(['success'=>'Invite sent successfully!']);
    }



    public function home(){
        $testimonials=Testimonial::all();
        $blogs=Blog::all();
        $users=User::where('id','!=',auth()->user()->id)->where('role','user')->get();
        return view('user.home',compact('testimonials','blogs','users'));
    }



    public function view($username){
        if ($username==auth()->user()->username){
            $user=User::find(auth()->user()->id);
            return view('user.profile.show',compact('user'));
        }
        return abort(404);
    }

    public function edit($username){
        if ($username==auth()->user()->username){
            $de=auth()->user()->details;
            return view('user.profile.edit',compact('de'));
        }
        return abort(404);
    }
    public function p_photo(){

        $files = File::files(public_path('user/defprofile'));
        $images=[];
        foreach ($files as $image){
            $checks=explode('/',str_replace('\\','/',$image));
            $checks=array_reverse($checks);
            $checks[0];
            $images[]=['file'=>$image,'name'=>$checks[0]];
        }
        return view('user.profile.photo',compact('images'));
    }
    public function location(){
        return view('user.profile.location');
    }

    public function profile(Request $request){
        $data=UserDetail::find(auth()->user()->details->id);
        if (!$data){
            $data=new UserDetail();
            $data->user_id=auth()->user()->id;
        }
        $attachment = time() . $request->profile->getClientOriginalName();
        Storage::disk('local')->put('/public/profile/' . $attachment, File::get($request->profile));
        $data->profile = $attachment;
        $data->save();
        return response()->json(['success'=>true,'profile'=>$data->profile_image()]);
    }
    public function cover(Request $request){
        /*
        $data=UserDetail::find(auth()->user()->details->id);
        if (!$data){
            $data=new UserDetail();
            $data->user_id=auth()->user()->id;
        }
        $attachment = time() . $request->cover->getClientOriginalName();
        Storage::disk('local')->put('/public/cover/' . $attachment, File::get($request->cover));
        $data->cover = $attachment;
        $data->save();
        */

        $image_parts = explode(";base64,", $request->image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';


        Storage::disk('local')->put('/public/cover/' . $imageName, $image_base64);



        $data=UserDetail::find(auth()->user()->details->id);
        if (!$data){
            $data=new UserDetail();
            $data->user_id=auth()->user()->id;
        }
        $data->cover = $imageName;
        $data->save();

        return response()->json(['success'=>true,'cover'=>$data->cover_image()]);
    }
    public function cover_photo_remove(Request $request){
        $data=UserDetail::find(auth()->user()->details->id);
        $data->cover = null;
        $data->save();
        return redirect()->back();
    }


    public function location_update(Request $request){
        $this->validate($request,[
            'location'=>'required',
        ]);
        $data=UserDetail::find(auth()->user()->details->id);
        if (!$data){
            $data=new UserDetail();
            $data->user_id=auth()->user()->id;
        }

        $data->longitude=$request->longitude;
        $data->latitude=$request->latitude;
        $data->location = $request->location;
        $data->save();
        return response()->json(['success'=>true]);
    }

    public function pre_profile(Request $request){

        $dest = public_path('storage/profile/');
        $fileName=time().$request->image;
        File::copy(public_path('user/defprofile/'.$request->image),$dest.$fileName);

        $data=UserDetail::find(auth()->user()->details->id);
        if (!$data){
            $data=new UserDetail();
            $data->user_id=auth()->user()->id;
        }
        $data->profile = $fileName;
        $data->save();
        return response()->json(['success'=>true,'profile'=>$data->profile_image()]);
    }

    public function basic(Request $request){
        $this->validate($request,[
           'headline'=>'required',
           'about_me'=>'required|max:100',
           'gender'=>'required',
           'employment_group'=>'required',
           'income_range'=>'required',
           'favourite_season'=>'required',
           'friend.*'=>'required',
           'education_level'=>'required',
        ]);
        $data=UserDetail::find(auth()->user()->details->id);
        if (!$data){
            $data=new UserDetail();
            $data->user_id=auth()->user()->id;
        }
        $data->headline=$request->headline;
        $data->about_me=$request->about_me;
        $data->gender=$request->gender;
        $data->employment_group=$request->employment_group;
        $data->income_range=$request->income_range;
        $data->favourite_season=$request->favourite_season;
        $data->travel=$request->travel;
        $data->spot_for_vacation=$request->spot_for_vacation;
        $data->education_level=$request->education_level;
        $data->save();
        return response()->json(['success'=>'Your basic information is updated successfully!']);
    }
    public function personal(Request $request){
        $this->validate($request,[
           'dob'=>'required',
           'astrology'=>'required',
           'relationship_status'=>'required',
           'children'=>'required',
           'smoke'=>'required',
           'pets'=>'required',
           'drink'=>'required',

        ]);
        $data=UserDetail::find(auth()->user()->details->id);
        if (!$data){
            $data=new UserDetail();
            $data->user_id=auth()->user()->id;
        }
        $data->dob=$request->dob;
        $data->astrology=$request->astrology;
        $data->relationship=$request->relationship_status;
        $data->children=$request->children;
        $data->smoke=$request->smoke;
        $data->pets=str_replace(',','@@@',$request->pets);
        $data->drink=$request->drink;
        $data->save();

        return response()->json(['success'=>'Your personal information is updated successfully!']);
    }
    public function about_me(Request $request){
        $this->validate($request,[
           'job_title'=>'required',
           'why_you_are_on_gfv'=>'required',
           'personality_type'=>'required',
           'communication_style'=>'required',
           'contact_by_people_from'=>'required',
           //'availability'=>'required',
        ]);
        $data=UserDetail::find(auth()->user()->details->id);
        if (!$data){
            $data=new UserDetail();
            $data->user_id=auth()->user()->id;
        }
        $data->job_title=$request->job_title;
        $data->why_you_are_on_gfv=$request->why_you_are_on_gfv;
        $data->personality_type=$request->personality_type;
        $data->communication_style=str_replace(',','@@@',$request->communication_style);
        $data->contact_by_people_from=str_replace(',','@@@',$request->contact_by_people_from);
        //$data->availability=str_replace(',','@@@',$request->availability);
        $data->save();

        return response()->json(['success'=>'Your about me info is updated successfully!']);
    }

    public function interest(Request $request)
    {
/*        $this->validate($request, [
            'hobbies' => 'required',
            'sports' => 'required',
            'fitness' => 'required',
            'entertainment' => 'required',
            'music' => 'required',
            'books' => 'required',
            'movies' => 'required',
            'fav_tv_shows' => 'required',
            'fav_movies' => 'required',
            'fav_hobbies' => 'required',
            'fav_teams' => 'required',
            'fav_bands' => 'required',
            'fav_books' => 'required',
        ]);*/
        $data = UserDetail::find(auth()->user()->details->id);
        if (!$data) {
            $data = new UserDetail();
            $data->user_id = auth()->user()->id;
        }
        $data->hobbies = str_replace(',', '@@@', $request->hobbies);
        $data->sports = str_replace(',', '@@@', $request->sports);
        $data->fitness = str_replace(',', '@@@', $request->fitness);
        $data->entertainment = str_replace(',', '@@@', $request->entertainment);
        $data->music = str_replace(',', '@@@', $request->music);
        $data->books = str_replace(',', '@@@', $request->books);
        $data->movies = str_replace(',', '@@@', $request->movies);

        $data->fav_tv_shows = $request->fav_tv_shows;
        $data->fav_movies = $request->fav_movies;
        $data->fav_hobbies = $request->fav_hobbies;
        $data->fav_teams = $request->fav_teams;
        $data->fav_bands = $request->fav_bands;
        $data->fav_books = $request->fav_books;

        $data->save();
        return response()->json(['success' => 'Your interest info is updated successfully!']);

    }
}
