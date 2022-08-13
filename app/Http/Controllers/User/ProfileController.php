<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function welcome(){
        return view('user.welcome');
    }
    public function show($username){
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
        return view('user.profile.photo');
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
    public function basic(Request $request){
        $this->validate($request,[
           'headline'=>'required',
           'about_me'=>'required',
           'gender'=>'required',
           'employment_group'=>'required',
           'income_range'=>'required',
           'hear_about'=>'required',
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
        $data->hear_about_us=$request->hear_about;
        $data->friends=implode('@@@',$request->friend);
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
           'availability'=>'required',
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
        $data->availability=str_replace(',','@@@',$request->availability);
        $data->save();

        return response()->json(['success'=>'Your about me info is updated successfully!']);
    }

    public function interest(Request $request)
    {
        $this->validate($request, [
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
        ]);
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
