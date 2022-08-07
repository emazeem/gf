<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    //
    public function index(){
        return view('admin.faqs');
    }
    public function fetch(){
        $data=Faq::all();
        return DataTables::of($data)
            ->addColumn('id', function ($data) {
                return $data->id;
            })
            ->addColumn('question', function ($data) {
                return $data->question;
            })
            ->addColumn('category', function ($data) {
                return $data->category->name;
            })

            ->addColumn('answer', function ($data) {
                return $data->answer;
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
            'category_id' =>'required',
            'question' =>'required',
            'answer' =>'required',
        ],[
            'category_id.required'=>'Category field is required * ',
            'question.required'=>'Name field is required * ',
            'answer.required'=>'Address field is required * ',
        ]);
        if ($request->id==0){
            $data = new Faq();
            $message='Added successfully!';
        }else{
            $data =Faq::find($request->id);
            $message='Updated successfully!';
        }
        $data->category_id = $request->category_id;
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();
        return response()->json(['success'=>$message]);
    }
    public function edit(Request $request){
        $update=Faq::find($request->id);
        return response()->json($update);
    }
    public function destroy(Request $request){
        Faq::find($request->id)->delete();
        return response()->json(['success'=>'Deleted successfully!']);
    }
}
