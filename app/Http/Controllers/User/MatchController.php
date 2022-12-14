<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Matched;
use App\Models\User;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    //
    public function show(){

        $match = Matched::where('from', auth()->user()->id)->get();
        $not_ID = [auth()->user()->id];
        foreach ($match as $m) {
            $not_ID[] = $m->to;
        }
        $users = User::where('role', 'user')->whereNotIn('id', $not_ID)->get();
        return view('user.match.index', compact('users'));
    }

    public function you_like(){

        $match = Matched::where('from', auth()->user()->id)->where('status', 'yes')->get();
        $ID = [];
        foreach ($match as $m) {
            $ID[] = $m->to;
        }
        $users = User::whereIn('id', $ID)->get();
        return view('user.match.you_like', compact('users'));
    }
    public function me_like(){

        $match = Matched::where('to', auth()->user()->id)->where('status', 'yes')->get();
        $ID = [];
        foreach ($match as $m) {
            $ID[] = $m->to;
        }
        $users = User::whereIn('id', $ID)->get();
        return view('user.match.like_me', compact('users'));
    }
    public function mutual(){
        $users=getMutualMatch();
        return view('user.match.mutual', compact('users'));
    }



    public function you_unlike(){

        $match = Matched::where('from', auth()->user()->id)->where('status', 'no')->get();
        $ID = [];
        foreach ($match as $m) {
            $ID[] = $m->to;
        }
        $users = User::whereIn('id', $ID)->get();
        return view('user.match.you_unlike', compact('users'));
    }


    public function action(Request $request)
    {
        $already = Matched::where('from', auth()->user()->id)->where('to', $request->to)->first();
        if (!$already) {
            $match = new Matched();
        } else {
            $match = $already;
        }
        $match->from = auth()->user()->id;
        $match->to = $request->to;
        $match->status = $request->status;
        $match->save();
        return response()->json(['success' => 'actioned']);
    }

    public function remove(Request $request)
    {
        $already = Matched::where('from', auth()->user()->id)->where('to', $request->to)->where('status', $request->status)->first();
        $already->delete();
        return response()->json(['success' => 'actioned']);
    }

    public function my_like(Request $request)
    {
        $already = Matched::where('from', auth()->user()->id)->where('to', $request->to)->first();
        if (!$already) {
            $match = new Matched();
            $match->from = auth()->user()->id;
            $match->to = $request->to;
            $match->status = $request->status;
            $match->save();
        }
        return response()->json(['success' => 'actioned']);
    }

}
