<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportsController extends Controller
{
    //

    public function index(){
        return view('admin.reports.index');
    }
    public function show($id){
        $report=Report::find($id);
        return view('admin.reports.show',compact('report'));
    }
    public function action(Request $request){
        $report=Report::find($request->id);
        $request->status=1;
        $report->save();
        return response()->json(['success'=>'Report is closed successfully!']);
    }


    public function fetch(){
        $data=Report::get();
        return DataTables::of($data)
            ->addColumn('from', function ($data) {
                return $data->fromUser->name;
            })
            ->addColumn('id', function ($data) {
                return $data->id();
            })
            ->addColumn('status', function ($data) {
                return $data->status();
            })

            ->addColumn('to', function ($data) {
                return $data->toUser->name;
            })

            ->addColumn('options', function ($data) {
                $action="<a href='".route('a.report.show',[$data->id])."' type='button' title='Edit' class='btn edit btn-sm btn-warning' data-toggle='modal' data-id='" . $data->id . "'><i class='fa fa-eye'></i></button>";
                return $action;
            })

            ->rawColumns(['options'])
            ->make(true);

    }
}
