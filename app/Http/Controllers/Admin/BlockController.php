<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlockController extends Controller
{
    //
    public function index(){
        return view('admin.block.index');
    }
    public function fetch(){
        $data=Block::get();
        return DataTables::of($data)
            ->addColumn('from', function ($data) {
                return $data->fromUser->name;
            })
            ->addColumn('date', function ($data) {
                return $data->created_at->format('d F,y');
            })
            ->addColumn('to', function ($data) {
                return $data->toUser->name;
            })
            ->rawColumns(['options'])
            ->make(true);

    }

}
