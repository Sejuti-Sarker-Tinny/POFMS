<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Expense;
use App\Models\Expense_category;
use Carbon\Carbon;
use Session;

class ExpenseController extends Controller{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Expense::where('expense_status',1)->join('expense_categories','expenses.excate_id','expense_categories.excate_id')->orderBy('expense_id','DESC')->get();
      return view('expense.all',compact('all'));
    }

    public function add(){
      $cateList=Expense_category::where('excate_status',1)->get();
      return view('expense.add',compact('cateList'));
    }

    public function edit($slug){
      $cateList=Expense_category::where('excate_status',1)->get();
      $data=Expense::where('expense_status',1)->where('expense_slug',$slug)->first();
      return view('expense.edit',compact('data','cateList'));
    }

    public function view($slug){
      $data=Expense::where('expense_status',1)->where('expense_slug',$slug)->first();
      return view('expense.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'details'=>'required',
        'amount'=>'required',
        'date'=>'required',
        'category'=>'required',
      ],[
        'details.required'=>'Please enter expense details!',
        'amount.required'=>'Please enter expense amaount!',
        'date.required'=>'Please enter expense date!',
        'category.required'=>'Please select expense category!'
      ]);

      $slug=uniqid('EXPENSE');

      $insertExpense=Expense::insert([
        'excate_id'=>$request['category'],
        'expense_details'=>$request['details'],
        'expense_amount'=>$request['amount'],
        'expense_date'=>$request['date'],
        'creator_id'=>Auth::user()->id,
        'expense_slug'=>$slug,
        'expense_status'=>1,
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]);

      if($insertExpense){
        Session::flash('insert_success');
        return redirect('admin/expense');
      }else{
        Session::flash('insert_error');
        return redirect('admin/expense');
      }
    }

    public function update(Request $request){
      $id=$request['id'];

      $this->validate($request,[
        'details'=>'required',
        'amount'=>'required',
        'date'=>'required',
        'category'=>'required',
      ],[
        'details.required'=>'Please enter expense details!',
        'amount.required'=>'Please enter expense amaount!',
        'date.required'=>'Please enter expense date!',
        'category.required'=>'Please select expense category!'
      ]);

      $updateExpense=Expense::where('expense_id',$id)->update([
        'excate_id'=>$request['category'],
        'expense_details'=>$request['details'],
        'expense_amount'=>$request['amount'],
        'expense_date'=>$request['date'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]);

      if($updateExpense){
        Session::flash('update_success');
        return redirect('admin/expense');
      }else{
        Session::flash('update_error');
        return redirect('admin/expense');
      }
    }

    public function softdelete(Request $request){
      $id=$request['modal_id'];

      $softDel=Expense::where('expense_id',$id)->update([
        'expense_status'=>0,
      ]);

      if($softDel){
        Session::flash('softDelete_success');
        return redirect('admin/expense');
      }else{
        Session::flash('softDelete_error');
        return redirect('admin/expense');
      }
    }

}
