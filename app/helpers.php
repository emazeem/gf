<?php

use Illuminate\Support\Facades\Mail;

class Friends
{
    const STATUS_REQUEST_SENT = 0;
    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 2;
}

function getTitleFromSlug($slug)
{
    return ucfirst(str_replace('-', ' ', $slug));
}

function sendEmail($to, $subject, $message)
{
    try {
        Mail::html($message, function ($message) use ($subject, $to) {
            $message->subject($subject)->to($to);
        });
        dd('Email sent successfully!');
        //return true;

    } catch (Exception $exception) {
        dd($exception);
        return response()->json($exception->getMessage());
    }
}

use Carbon\Carbon;
use App\Models\User;
use App\Models\Friend;

function getUserAge($id)
{
    $user = User::find($id);
    $created = new Carbon($user->details->dob);
    $now = Carbon::now();
    $difference = ($created->diff($now)->days < 1) ? 'today' : $created->diffForHumans($now);
    return str_replace('years before', '', $created->diffForHumans($now));
}

function receivedFriendRequest($id)
{
    if (Friend::where('to', auth()->user()->id)->where('from', $id)->where('status', Friends::STATUS_REQUEST_SENT)->get()->count() > 0) {
        return true;
    }
    return false;
}

function receivedAnyApprovedRequest($id)
{

    $anyOne = false;
    if (Friend::where('to', auth()->user()->id)->where('from', $id)->where('status', Friends::STATUS_APPROVED)->get()->count()) {
        $anyOne = true;
    }
    if (Friend::where('to', $id)->where('from', auth()->user()->id)->where('status', Friends::STATUS_APPROVED)->get()->count()) {
        $anyOne = true;
    }
    return $anyOne;
}

function checkApprovedRequest($id)
{

    $anyOne = '';
    if (Friend::where('to', auth()->user()->id)->where('from', $id)->where('status', Friends::STATUS_APPROVED)->get()->count()) {
        $anyOne = 'friends';
    }
    if (Friend::where('to', $id)->where('from', auth()->user()->id)->where('status', Friends::STATUS_APPROVED)->get()->count()) {
        $anyOne = 'friends';
    }
    return $anyOne;
}

function friendRequestSent($to)
{
    if (Friend::where('from', auth()->user()->id)->where('to', $to)->where('status', Friends::STATUS_REQUEST_SENT)->get()->count() == 0) {
        return false;
    }
    return true;
}

function getFriendsList($id)
{
    $friends = Friend::where('from', $id)->where('status', \Friends::STATUS_APPROVED)->orwhere('to', $id)->where('status', \Friends::STATUS_APPROVED)->get();
    $users = [];
    foreach ($friends as $friend) {
        if ($id == $friend->from) {
            $user = $friend->to;
        }
        if ($id == $friend->to) {
            $user = $friend->from;
        }
        $users[] = $user;
    }
    $users = User::whereIn('id', $users)->get();
    return $users;
}

function friendRequestsReceived($id)
{
    $friends = Friend::where('to', $id)->where('status', Friends::STATUS_REQUEST_SENT)->orwhere('from', $id)->get();
    $users = [];
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

use App\Models\Matched;

function getMutualMatch($id = null)
{
    if ($id == null) {
        $id = auth()->user()->id;
    }
    $match = Matched::where('from', $id)->where('status', 'yes')->get();
    $ID = [];
    foreach ($match as $m) {
        if (count(Matched::where('to', $id)->where('from', $m->to)->where('status', 'yes')->get()) > 0) {
            $ID[] = $m->to;
        }
    }
    $users = User::whereIn('id', $ID)->get();
    return $users;
}

use Illuminate\Support\Facades\DB;

function NotificationFrom($id)
{
    $notification = DB::table('notifications')->where('id', $id)->first();
    $notification = json_encode($notification, true);
    $notification = json_decode($notification, true);
    $data = json_decode($notification['data'], true);
    $from = $data['from'];
    $fromUser = User::find($from);
    return $fromUser;
}

use App\Models\Chat;

function unReadMessages($id = null)
{
    if (!$id) {
        $id = auth()->user()->id;
    }
    $unread = Chat::all()->where('to', $id)->where('read_at', null);
    return $unread;
}

function getArrayFromKeyofEloquent($eloquent, $key)
{
    $array = [];
    foreach ($eloquent as $k => $item) {
        $array[] = $item[$key];
    }
    return $array;
}

use App\Models\Block;

function blockedUserFilter($users)
{
    $blocked = Block::where('from', auth()->user()->id)->get();
    $bFROM = getArrayFromKeyofEloquent($blocked, 'to');
    $blocked = Block::where('to', auth()->user()->id)->get();
    $bTO = getArrayFromKeyofEloquent($blocked, 'from');
    $BID = array_merge($bFROM, $bTO);
    return $users->whereNotIn('id', $BID);
}

function ifUserInBlockList($id)
{
    $blocked = Block::where('from', $id)->orwhere('to', $id)->get()->count();
    if ($blocked > 0) {
        return true;
    }
    return false;
}

function getPackageDetails($id){
    return \App\Models\Product::find($id);
}
function ifUpgraded($id=null){
    if ($id==null){$id=auth()->user()->id;}
    $order=\App\Models\Order::where('user_id',$id)->where('status','Active')->whereDate('end','>',date('Y-m-d'))->first();
    if ($order){
        return true;
    }
    return false;
}