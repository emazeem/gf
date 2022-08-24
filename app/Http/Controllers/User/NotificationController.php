<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function show(){
        return view('user.notifications');
    }
    public function delete(Request $request){
        $notification = auth()->user()->notifications()->find($request->id);
        $notification->delete();
        return response()->json(true);
    }

    public function mark_as_read(Request $request){
        $notification = auth()->user()->notifications()->find($request->id);
        $notification->markAsRead();
        return response()->json(true);
    }
}
