<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function basic_info(){
        return view('auth.basic_info');
    }
    public function verification_email_sent(){
        return view('auth.verification_email_sent');
    }
    public function verification_link($username,$token){
        $user=User::where('username',$username)->first();
        if ($user){
            if ($user->remember_token==$token){
                $user->email_verified_at=date('Y-m-d H:i:s');
                $user->save();
            }
        }
        return view('auth.verification_link',compact('user'));
    }

    public function basic_info_store(Request $request){
        $this->validate($request,[
           'gender'=>'required',
           'hear_about'=>'required',
           'location'=>'required',
           'dob'=>'required',
        ]);
        $already=UserDetail::where('user_id',auth()->user()->id)->first();
        $detail=($already)? $already : new UserDetail();
        $detail->user_id=auth()->user()->id;
        $detail->gender=$request->gender;
        $detail->location=$request->location;
        $detail->dob=$request->dob;
        $detail->hear_about_us=$request->hear_about;
        $detail->save();
        $user=User::find(auth()->user()->id);
        $user->remember_token=Str::random(50);
        $user->save();
        return redirect()->route('user.verification.email.sent');
    }

}
