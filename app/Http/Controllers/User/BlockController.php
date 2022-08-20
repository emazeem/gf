<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function blocked(Request $request){
        if (Block::where('from',auth()->user()->id)->where('to',$request->to)->get()->count()==0 && Block::where('from',$request->to)->where('to',auth()->user()->id)->get()->count()==0 ){
            $friends=new Block();
            $friends->from=auth()->user()->id;
            $friends->to=$request->to;
            $friends->save();
        }
        return response()->json(['success'=>'sent']);
    }
}
