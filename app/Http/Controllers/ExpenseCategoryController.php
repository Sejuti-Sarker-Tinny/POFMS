<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;
use App\Models\Expense_category;

class ExpenseCategoryController extends Controller{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Expense_category::where('excate_status',1)->orderBy('excate_id','DESC')->get();
      return view('expense-category.all',compact('all'));
    }

    public function add(){
      return view('expense-category.add');
    }

    public function edit($slug){
      $data=Expense_category::where('excate_status',1)->where('excate_slug',$slug)->first();
      return view('expense-category.edit',compact('data'));
    }

    public function view($slug){
      $data=Expense_category::where('excate_status',1)->where('excate_slug',$slug)->first();
      return view('expense-category.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required|unique:expense_categories,excate_name',
      ],[
        'name.required'=>'Expense category name is required.',
        'name.unique'=>'This expense category name is already taken.'
      ]);

      $slug=uniqid('EXCATE');

      $insertExpenseCategory=Expense_category::insert([
        'excate_name'=>$request['name'],
        'excate_remarks'=>$request['remarks'],
        'excate_creator'=>Auth::user()->id,
        'excate_slug'=>$slug,
        'excate_status'=>1,
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]);

      if($insertExpenseCategory){
        Session::flash('insert_success');
        return redirect('admin/expense/category');
      }else{
        Session::flash('insert_error');
        return redirect('admin/expense/category');
      }
    }

    public function update(Request $request){
      $id=$request['id'];

      $this->validate($request,[
        'name'=>'required',
      ],[
        'name.required'=>'Expense category name is required.',
      ]);

      $updateExpenseCategory=Expense_category::where('excate_id',$id)->update([
        'excate_name'=>$request['name'],
        'excate_remarks'=>$request['remarks'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]);

      if($updateExpenseCategory){
        Session::flash('update_success');
        return redirect('admin/expense/category');
      }else{
        Session::flash('update_error');
        return redirect('admin/expense/category');
      }
    }

    public function softdelete(Request $request){
      $id=$request['modal_id'];

      $softDel=Expense_category::where('excate_id',$id)->update([
        'excate_status'=>0,
      ]);

      if($softDel){
        Session::flash('softDelete_success');
        return redirect('admin/expense/category');
      }else{
        Session::flash('softDelete_error');
        return redirect('admin/expense/category');
      }
    }
}
