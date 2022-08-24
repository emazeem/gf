<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Friend;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function blocked(Request $request){
        $friend=Friend::where('from',auth()->user()->id)->where('to',$request->to)->orwhere('to',auth()->user()->id)->where('from',$request->to)->first();
        if (
            Block::where('from',auth()->user()->id)->where('to',$request->to)->get()->count()==0
            && Block::where('from',$request->to)->where('to',auth()->user()->id)->get()->count()==0 ){
            $friends=new Block();
            $friends->from=auth()->user()->id;
            $friends->to=$request->to;
            $friends->save();
            if ($friend){
                $friend->delete();
            }
        }
        return response()->json(['success'=>'sent']);
    }
}
