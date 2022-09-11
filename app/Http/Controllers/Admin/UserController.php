<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    //
    public function index(){
        return view('admin.users.index');
    }
    public function show($id){
        $user=User::find($id);
        return view('admin.users.show',compact('user'));
    }

    public function fetch(){
        $data=User::where('role','user')->get();
        return DataTables::of($data)
            ->addColumn('profile', function ($data) {
                return "<img src='{$data->details->profile_image()}' width='40' style='border-radius: 50%'>";
            })
            ->addColumn('options', function ($data) {
                $action="<a href='".route('a.user.show',[$data->id])."' type='button' title='Edit' class='btn edit btn-sm btn-warning' data-toggle='modal' data-id='" . $data->id . "'><i class='fa fa-eye'></i></button>";
                return $action;
            })
            ->rawColumns(['options','profile'])
            ->make(true);

    }
    public function disable(Request $request){
        $user=User::find($request->id);
        $user->status=$request->status;
        $user->save();
        return redirect()->back()->with('success','Account is deleted successfully!');
    }
}
