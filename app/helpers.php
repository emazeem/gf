<?php
use Illuminate\Support\Facades\Mail;

class Friends{
    const STATUS_REQUEST_SENT=0;
    const STATUS_APPROVED=1;
    const STATUS_REJECTED=2;
}

function getTitleFromSlug($slug){
    return ucfirst(str_replace('-',' ',$slug));
}
function sendEmail($to,$from,$subject,$message){
    if ($from==null){
        $from='connectsocial@napollo.net';
    }

    try{
        Mail::html( $message, function( $message ) use ($subject,$to) {
            $message->subject( $subject )->to( $to );
        });
        return true;
    }catch (Exception $exception){
        return response()->json($exception->getMessage());
    }
}
use Carbon\Carbon;
use App\Models\User;
use App\Models\Friend;

function getUserAge($id){
    $user=User::find($id);
    $created = new Carbon($user->details->dob);
    $now = Carbon::now();
    $difference = ($created->diff($now)->days < 1) ? 'today' : $created->diffForHumans($now);
    return str_replace('years before','',$created->diffForHumans($now));
}

function receivedFriendRequest($id){
    if (Friend::where('to',auth()->user()->id)->where('from',$id)->where('status',Friends::STATUS_REQUEST_SENT)->get()->count()>0){
        return true;
    }
    return false;
}
function receivedAnyApprovedRequest($id){

    $anyOne=false;
    if (Friend::where('to',auth()->user()->id)->where('from',$id)->where('status',Friends::STATUS_APPROVED)->get()->count()){
        $anyOne=true;
    }
    if (Friend::where('to',$id)->where('from',auth()->user()->id)->where('status',Friends::STATUS_APPROVED)->get()->count()){
        $anyOne=true;
    }
    return $anyOne;
}

function checkApprovedRequest($id){

    $anyOne='';
    if (Friend::where('to',auth()->user()->id)->where('from',$id)->where('status',Friends::STATUS_APPROVED)->get()->count()){
        $anyOne='friends';
    }
    if (Friend::where('to',$id)->where('from',auth()->user()->id)->where('status',Friends::STATUS_APPROVED)->get()->count()){
        $anyOne='friends';
    }
    return $anyOne;
}

function friendRequestSent($to){
    if (Friend::where('from',auth()->user()->id)->where('to',$to)->where('status',Friends::STATUS_REQUEST_SENT)->get()->count()==0){
        return false;
    }
    return true;
}
function getFriendsList($id){
    $friends=Friend::where('from',$id)->where('status',\Friends::STATUS_APPROVED)->orwhere('to',$id)->where('status',\Friends::STATUS_APPROVED)->get();
    $users=[];
    foreach ($friends as $friend){
        if ($id==$friend->from){
            $user=$friend->to;
        }
        if ($id==$friend->to){
            $user=$friend->from;
        }
        $users[]=$user;
    }
    $users=User::whereIn('id',$users)->get();
    return $users;
}
function friendRequestsReceived($id){
    $friends=Friend::where('to',$id)->where('status',Friends::STATUS_REQUEST_SENT)->orwhere('from',$id)->get();
    $users=[];
    foreach ($friends as $friend) {
        if ($id == $friend->from) {
            $user = $friend->user_to;
        }
        if ($id == $friend->to) {
            $user = $friend->user_from;
        }
        $users[] = $user;
    }
    return $users;
}