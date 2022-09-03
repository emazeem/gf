<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Friend;
use App\Models\User;
use App\Notifications\CustomNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class FriendController extends Controller
{
    //

    public function show(Request $request){
        $id=auth()->user()->id;
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
        $users=User::whereIn('id',$users);
        $key=null;
        if ($request->s){
            $key=$request->s;
            $users= $users->where('role','user')->whereRaw('( username LIKE "%' . $key . '%" or name LIKE "%' . $key . '%"  )');
        }
        $friends=$users->get();
        return view('user.friends',compact('friends','key'));
    }
    public function send_request(Request $request){
        if (Friend::where('from',auth()->user()->id)->where('to',$request->to)->get()->count()==0){
            $friends=new Friend();
            $friends->from=auth()->user()->id;
            $friends->to=$request->to;

            Notification::send(User::find($request->to), new CustomNotifications(
                    auth()->user()->username.' sent you a friend request.',route('user.profile.other',[auth()->user()->username])));
            $friends->save();
        }
        return response()->json(['success'=>'sent']);
    }


    public function cancel_request(Request $request){
        $req=Friend::where('from',auth()->user()->id)->where('to',$request->id)->where('status',0)->first();
        $req->delete();
        return response()->json(['success'=>'removed']);
    }
    public function un_friend(Request $request){
        $req=Friend::where('from',auth()->user()->id)->where('to',$request->id)->where('status',1)->first();
        if ($req){
            $req->delete();
        }
        $req=Friend::where('to',auth()->user()->id)->where('from',$request->id)->where('status',1)->first();
        if ($req){
            $req->delete();
        }
        return response()->json(['success'=>'removed']);
    }
    public function show_control(Request $request)
    {

        $from = auth()->user()->id;
        $to = $request->id;
        $addAsFriend = "         <button class='btn btn-light border add-as-friend' data-to='" . $to . "'><i class='bi bi-plus-circle'></i> Add Friend</button>";
        $sendMessage = "         <a class='btn btn-light border' href='".route('user.chat',[$to])."'><i class='bi bi-envelope'></i> Send Message</a>";
        $confirmFriendRequest = '<button class="btn btn-light border friend-request-sent approve" data-id="' . $to . '">Confirm Friend Request</button>';
        $rejectFriendRequest = ' <button class="btn btn-light border friend-request-sent decline" data-id="' . $to . '">Delete Friend Request</button>';
        $cancelFriendRequest = " <button class='btn btn-light border cancel-friend-request' data-id='" . $to . "'>Cancel Friend Request</button>";
        $unfriend = "            <button class='btn btn-light border remove-friend' data-id='" . $to . "'>Unfriend</button>";
        $block = "               <button class='btn btn-light border block' data-id='" . $to . "'><i class='bi bi-x-circle'></i> Block</button>";
        $blocked = "               <button class='btn btn-light border disabled' data-id='" . $to . "'><i class='bi bi-x-circle'></i> Blocked</button>";
        $reportUser = "          <button class='btn btn-light border report-user' data-id='" . $to . "'><i class='bi bi-flag'></i> Report User</button>";

        $data = $sendMessage;
        if (receivedFriendRequest($to)) {
            $data .= $confirmFriendRequest;
            $data .= $rejectFriendRequest;
        }elseif (receivedAnyApprovedRequest($to)) {
            if (checkApprovedRequest($to) == 'friends') {
                $data .= $unfriend;
            }
        } else {
            if (friendRequestSent($to)) {
                $data .= $cancelFriendRequest;
            }else {
                $data .= $addAsFriend;
            }
        }
        if (
            Block::where('from',auth()->user()->id)->where('to',$to)->get()->count()==0 &&
            Block::where('from',$to)->where('to',auth()->user()->id)->get()->count()==0 )
        {
            $data.=$block;
        }else{
            $data.=$blocked;
        }
        $data.=$reportUser;
        return response()->json($data);
    }
    public function action(Request $request){
        $action=Friend::where('to',auth()->user()->id)->where('from',$request->id)->first();
        if($request->status==1){
            $action->status=$request->status;

            Notification::send(User::find($request->id), new CustomNotifications(
                auth()->user()->username.' accepted your friend request.',route('user.profile.other',[auth()->user()->username])));

            $action->save();
        }else{
            $action->delete();
        }
        return response()->json(['success'=>'actioned']);
    }

}
