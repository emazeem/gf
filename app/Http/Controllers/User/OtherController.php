<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\User;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //
    public function show($username){
        $user=User::where('username',$username)->first();
        if (ifUserInBlockList($user->id)){
            return abort(404);
        }
        return ($user)    ?   view('user.other.profile',compact('user'))    :    abort(404);
    }

}
