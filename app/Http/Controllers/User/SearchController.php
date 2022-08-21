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
        $requests=[];
        if ($request->all()){
            $requests=$request->all();
            if ($request->location){
                $key=$request->location;
                $users=$users->whereHas('details', function($q) use ($key){
                    $q->where('location', $key);
                });
            }
            if ($request->min_age){
                $year=date('Y', strtotime('-'.$request->min_age.' years'));
                $UID=[];
                foreach ($users->get() as $user) {
                    $dob=date('Y',strtotime($user->details->dob));
                    if ($year>=$dob){ $UID[]=$user->id; }
                }
                $users=User::whereIn('id',$UID);
            }
            if ($request->max_age){
                $year=date('Y', strtotime('-'.$request->max_age.' years'));
                $UID=[];
                foreach ($users->get() as $user) {
                    $dob=date('Y',strtotime($user->details->dob));
                    if ($year<=$dob){ $UID[]=$user->id; }
                }
                $users=User::whereIn('id',$UID);
            }
            if ($request->key){
                $key=$request->key;
                $users=$users->whereHas('details', function($q) use ($key){
                    $q->whereRaw('( username LIKE "%' . $key . '%" or name LIKE "%' . $key . '%"  )');
                });
            }
            if ($request->children){
                dd($request->all());
            }
        }
        $users=$users->get();
        foreach ($users as $user){
            $user->details->dob.'<br>';
        }
        //dd(1);
        return view('user.search',compact('users','key','requests'));
    }

}
