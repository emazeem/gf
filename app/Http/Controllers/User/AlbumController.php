<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //
    public function index(){
        return view('user.album.index');
    }
    public function store(Request $request){
        dd($request->all());
    }
}
