<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\ProfileView;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class OtherController extends Controller
{
    //
    public function show($username){
        $user=User::where('username',$username)->first();
        if (ifUserInBlockList($user->id)){
            return abort(404);
        }
        if (ProfileView::where('view_by',auth()->user()->id)->where('view_to',$user->id)->get()->count()==0){
            ProfileView::create(['view_by'=>auth()->user()->id,'view_to'=>$user->id]);
        }
        return ($user)    ?   view('user.other.profile',compact('user'))    :    abort(404);
    }

}
