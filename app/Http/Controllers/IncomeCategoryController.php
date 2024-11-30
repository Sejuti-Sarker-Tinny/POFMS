<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income_category;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Auth;
use Auth;
use Session;

class IncomeCategoryController extends Controller{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Income_category::where('incate_status',1)->orderBy('incate_id','desc')->get();
      return view('income-category.all',compact('all'));
    }

    public function add(){
      return view('income-category.add');
    }

    public function edit($slug){
      $data=Income_category::where('incate_status',1)->where('incate_slug',$slug)->first();
      return view('income-category.edit',compact('data'));
    }

    public function view($slug){
      $data=Income_category::where('incate_status',1)->where('incate_slug',$slug)->first();
      return view('income-category.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required|unique:income_categories,incate_name',
      ],[
        'name.required'=>'Income category name is required.',
        'name.unique'=>'This income category name is already taken.'
      ]);

      $slug=uniqid('INCATE');

      $insertIncomeCategory=Income_category::insert([
        'incate_name'=>$request['name'],
        'incate_remarks'=>$request['remarks'],
        'incate_creator'=>Auth::user()->id,
        'incate_slug'=>$slug,
        'incate_status'=>1,
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]);

      if($insertIncomeCategory){
        Session::flash('insert_success');
        return redirect('admin/income/category');
      }else{
        Session::flash('insert_error');
        return redirect('admin/income/category');
      }
    }

    public function update(Request $request){
      $id=$request['id'];

      $this->validate($request,[
        'name'=>'required',
      ],[
        'name.required'=>'Income category name is required.',
      ]);

      $updateIncomeCategory=Income_category::where('incate_id',$id)->update([
        'incate_name'=>$request['name'],
        'incate_remarks'=>$request['remarks'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]);

      if($updateIncomeCategory){
        Session::flash('update_success');
        return redirect('admin/income/category');
      }else{
        Session::flash('update_error');
        return redirect('admin/income/category');
      }
    }

    public function softdelete(Request $request){
      $id=$request['modal_id'];

      $softDel=Income_category::where('incate_id',$id)->update([
        'incate_status'=>0,
      ]);

      if($softDel){
        Session::flash('softDelete_success');
        return redirect('admin/income/category');
      }else{
        Session::flash('softDelete_error');
        return redirect('admin/income/category');
      }
    }

}
