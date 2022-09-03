<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
           'type'=>'required',
           'description'=>'required',
        ]);
        $report=new Report();
        $report->from=auth()->user()->id;
        $report->to=$request->id;
        $report->type=$request->type;
        $report->description=$request->description;
        $report->save();
        return response()->json(['success'=>'Your report is submitted successfully!']);
    }
}
