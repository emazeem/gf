<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FaqCategoryController extends Controller
{
    //
    public function index(){
        return view('admin.faqs_category');
    }
    public function fetch(){
        $data=FaqCategory::all();
        return DataTables::of($data)
            ->addColumn('id', function ($data) {
                return $data->id;
            })
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('options', function ($data) {
                $action="<button type='button' title='Edit' class='btn edit btn-sm btn-success' data-toggle='modal' data-id='" . $data->id . "'><i class='fa fa-edit'></i></button>";
                $action.="<button type='button' title='Delete' class='btn delete btn-sm btn-danger' data-id='" . $data->id . "'><i class='fa fa-trash'></i></button>";
                return $action;
            })
            ->rawColumns(['options','image'])
            ->make(true);

    }
    public function store(Request $request){
        $this->validate(\request(),[
            'name' =>'required',
        ],[
            'name.required'=>'Name field is required * ',
        ]);
        if ($request->id==0){
            $data = new FaqCategory();
            $message='Added successfully!';
        }else{
            $data =FaqCategory::find($request->id);
            $message='Updated successfully!';
        }
        $data->name = $request->name;
        $data->save();
        return response()->json(['success'=>$message]);
    }
    public function edit(Request $request){
        $update=FaqCategory::find($request->id);
        return response()->json($update);
    }
    public function destroy(Request $request){
        FaqCategory::find($request->id)->delete();
        return response()->json(['success'=>'Deleted successfully!']);
    }
}
