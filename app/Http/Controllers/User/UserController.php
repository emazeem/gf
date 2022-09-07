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
           'location'=>'required',
           'dob'=>'required|date|before:-18 years',
        ]);
        $already=UserDetail::where('user_id',auth()->user()->id)->first();
        $detail=($already)? $already : new UserDetail();
        $detail->user_id=auth()->user()->id;
        $detail->gender=$request->gender;
        $detail->location=$request->location;
        $detail->dob=$request->dob;
        $detail->save();
        $token=Str::random(50);
        $user=User::find(auth()->user()->id);
        $user->remember_token=$token;
        $user->save();
        sendEmail(auth()->user()->email,'Email Verification','Please verify your account using link given below. <a href="'.url('verification-link/'.auth()->user()->username.'/'.$token).'">Click here</a>');
        return redirect()->route('user.verification.email.sent');
    }
    public function resend_link(Request $request){
        sendEmail(auth()->user()->email,'Email Verification','Please verify your account using link given below. <a href="'.url('verification-link/'.auth()->user()->username.'/'.auth()->user()->remember_token).'">Click here</a>');
        return redirect()->back()->with('success','Verification link is sent to '.auth()->user()->email);
    }
}
