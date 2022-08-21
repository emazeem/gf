<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function show(Request $request){
        $users=User::where('role','user');
        $key=null;
        if ($request->s){
        }
        $friends=$users->get();
        return view('user.search',compact('friends','key'));
    }

}
