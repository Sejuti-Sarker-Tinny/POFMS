<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Income;
use App\Models\Expense;

class SummaryController extends Controller{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $month = Carbon::now()->format('m');
    $fullMonth = Carbon::now()->format('F');
    $year = Carbon::now()->format('Y');
    $incomes = Income::where('income_status',1)->whereMonth('income_date','=', $month)->whereYear('income_date','=', $year)->get();
    $incomeTotal = Income::where('income_status',1)->whereMonth('income_date','=', $month)->whereYear('income_date','=', $year)->sum('income_amount');
    $expenses = Expense::where('expense_status',1)->whereMonth('expense_date','=', $month)->whereYear('expense_date','=', $year)->get();
    $expenseTotal = Expense::where('expense_status',1)->whereMonth('expense_date','=', $month)->whereYear('expense_date','=', $year)->sum('expense_amount');

    return view('summary.all',compact('month','fullMonth','year','incomes','incomeTotal','expenses','expenseTotal'));
  }

  public function search($from,$to){
    $income = Income::where('income_status', 1)->whereBetween('income_date', [$from, $to])->get();
    $incomeTotal = Income::where('income_status', 1)->whereBetween('income_date', [$from, $to])->sum('income_amount');
    $expense = Expense::where('expense_status', 1)->whereBetween('expense_date', [$from, $to])->get();
    $expenseTotal = Expense::where('expense_status', 1)->whereBetween('expense_date', [$from, $to])->sum('expense_amount');
    return view('summary.search', compact('income','incomeTotal','expense','expenseTotal','from','to'));
  }

  
    public function custom_report(){
    $month = Carbon::now()->format('m');
    $fullMonth = Carbon::now()->format('F');
    $year = Carbon::now()->format('Y');
    $incomes = Income::where('income_status',1)->whereMonth('income_date','=', $month)->whereYear('income_date','=', $year)->get();
    $incomeTotal = Income::where('income_status',1)->whereMonth('income_date','=', $month)->whereYear('income_date','=', $year)->sum('income_amount');
    $expenses = Expense::where('expense_status',1)->whereMonth('expense_date','=', $month)->whereYear('expense_date','=', $year)->get();
    $expenseTotal = Expense::where('expense_status',1)->whereMonth('expense_date','=', $month)->whereYear('expense_date','=', $year)->sum('expense_amount');

    return view('summary.custom-report',compact('month','fullMonth','year','incomes','incomeTotal','expenses','expenseTotal'));
  }
}
