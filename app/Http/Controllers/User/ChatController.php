<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index(){
        return view('user.chat');
    }
    public function fetch_user_list(Request $request)
    {
        if ($request->search){
            $data=User::where('name', 'like', '%'.$request->search.'%')->where('id','!=',auth()->user()->id)->get();
        }else{
            $data=User::all()->where('id','!=',auth()->user()->id);
        }
        $users=[];
        foreach ($data as $datum){
            $users[]=[
                'id'=>$datum->id,
                'name'=>$datum->name,
                'online'=>1,
                'src'=>$datum->details->profile_image(),
            ];
        }

        return response()->json($users);
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'to'=>'required',
            'message'=>'required',
        ]);
        $chat = new Chat();
        $chat->message=$request->message;
        $chat->to=$request->to;
        $chat->from=auth()->user()->id;
        $chat->save();
        $time=$chat->created_at->format('h:i A');

        /*$data=[
            'to'=>$request->to,
            'from'=>auth()->user()->id,
            'message'=>$request->message,
            'created_at'=>$time,
        ];

        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );
        //Remember to set your credentials below.
        $pusher = new Pusher(
            'efcac9346172687a4645',
            '05c967b740b40d3ba06f',
            '1250707', $options
        );
        $pusher->trigger('channel-chat', 'App\Events\Chat', $data);
        */
        return response()->json($time);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $chat=Chat::where('to',$request->user)->where('from',auth()->user()->id)->orwhere('from',$request->user)->where('to',auth()->user()->id)->get();
        $messages=[];
        $dates=[];
        foreach ($chat as $item) {
            $messages[]=[
                'left'=>$item->from==auth()->user()->id?true:false,
                'message'=>$item->message,
                'date'=>$item->created_at->format('M d, Y'),
                'time'=>$item->created_at->format('h:i A')
            ];
            $dates[]=$item->created_at->format('M d, Y');
        }
        $dates=array_values(array_unique($dates));
        $data=[];
        foreach ($dates as $date){
            $data[$date]=[];
            foreach ($messages as $k=>$message){
                if ($message['date']==$date){
                    $data[$date][]=$message;
                }
            }
        }

        return response()->json($data);
    }

}
