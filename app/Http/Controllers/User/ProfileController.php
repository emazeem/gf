<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function welcome(){
        return view('user.welcome');
    }
    public function show($username){
        if ($username==auth()->user()->username){
            return view('user.profile.show');
        }
        return abort(404);
    }
    public function edit($username){
        if ($username==auth()->user()->username){
            return view('user.profile.edit');
        }
        return abort(404);
    }


}
