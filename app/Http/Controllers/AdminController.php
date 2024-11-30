<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Income;
use App\Models\Expense;

class AdminController extends Controller{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $to = Carbon::now()->format('Y-m-d');
    $from = date('Y-m-d', strtotime('-7 days', strtotime($to)));
    $last_7days_income = Income::where('income_status',1)->where('income_date','>=',$from)->where('income_date','<=',$to)->get();
    $last_7days_all_income = Income::where('income_status',1)->where('income_date','>=',$from)->where('income_date','<=',$to)->sum('income_amount');
    $last_7days_expense = Expense::where('expense_status',1)->where('expense_date','>=',$from)->where('expense_date','<=',$to)->get();
    $last_7days_all_expense = Expense::where('expense_status',1)->where('expense_date','>=',$from)->where('expense_date','<=',$to)->sum('expense_amount');
    $total_income = Income::where('income_status',1)->sum('income_amount');
    $total_expense = Expense::where('expense_status',1)->sum('expense_amount');
    return view('dashboard.home',compact('last_7days_income','last_7days_all_income','last_7days_expense','last_7days_all_expense','total_income','total_expense'));
  }
}
