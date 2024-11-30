<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Income;
use App\Models\Income_category;
use Carbon\Carbon;
use Session;

class IncomeController extends Controller{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all = Income::where('income_status',1)
                ->join('income_categories','incomes.incate_id','=','income_categories.incate_id')
                ->orderBy('income_id','DESC')
                ->get();

      return view('income.all',compact('all'));
    }

    public function add(){
      $cateList=Income_category::where('incate_status',1)->get();
      return view('income.add',compact('cateList'));
    }

    public function edit($slug){
      $cateList=Income_category::where('incate_status',1)->get();
      $data=Income::where('income_status',1)->where('income_slug',$slug)->first();
      return view('income.edit',compact('data','cateList'));
    }

    public function view($slug){
      $data=Income::where('income_status',1)->where('income_slug',$slug)->first();
      return view('income.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'details'=>'required',
        'amount'=>'required',
        'date'=>'required',
        'category'=>'required',
      ],[
        'details.required'=>'Please enter income details!',
        'amount.required'=>'Please enter income amaount!',
        'date.required'=>'Please enter income date!',
        'category.required'=>'Please select income category!'
      ]);

      $slug=uniqid('INCOME');

      $insertIncome=Income::insert([
        'incate_id'=>$request['category'],
        'income_details'=>$request['details'],
        'income_amount'=>$request['amount'],
        'income_date'=>$request['date'],
        'creator_id'=>Auth::user()->id,
        'income_slug'=>$slug,
        'income_status'=>1,
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]);

      if($insertIncome){
        Session::flash('insert_success');
        return redirect('admin/income');
      }else{
        Session::flash('insert_error');
        return redirect('admin/income');
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
        'details.required'=>'Please enter income details!',
        'amount.required'=>'Please enter income amaount!',
        'date.required'=>'Please enter income date!',
        'category.required'=>'Please select income category!'
      ]);

      $updateIncome=Income::where('income_id',$id)->update([
        'incate_id'=>$request['category'],
        'income_details'=>$request['details'],
        'income_amount'=>$request['amount'],
        'income_date'=>$request['date'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString()
      ]);

      if($updateIncome){
        Session::flash('update_success');
        return redirect('admin/income');
      }else{
        Session::flash('update_error');
        return redirect('admin/income');
      }
    }

    public function softdelete(Request $request){
      $id=$request['modal_id'];

      $softDel=Income::where('income_id',$id)->update([
        'income_status'=>0,
      ]);

      if($softDel){
        Session::flash('softDelete_success');
        return redirect('admin/income');
      }else{
        Session::flash('softDelete_error');
        return redirect('admin/income');
      }
    }
}
