<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SummaryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect('/login');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware(['auth'])->name('dashboard');
*/
Route::get('/dashboard', [AdminController::class, 'index']);
//income category
Route::get('admin/income/category', [IncomeCategoryController::class, 'index']);
Route::get('admin/income/category/add', [IncomeCategoryController::class, 'add']);
Route::get('admin/income/category/edit/{slug}', [IncomeCategoryController::class, 'edit']);
Route::get('admin/income/category/view/{slug}', [IncomeCategoryController::class, 'view']);
Route::post('admin/income/category/insert', [IncomeCategoryController::class, 'insert']);
Route::post('admin/income/category/update', [IncomeCategoryController::class, 'update']);
Route::post('admin/income/category/softdelete', [IncomeCategoryController::class, 'softdelete']);
//income
Route::get('admin/income', [IncomeController::class, 'index']);
Route::get('admin/income/add', [IncomeController::class, 'add']);
Route::get('admin/income/edit/{slug}', [IncomeController::class, 'edit']);
Route::get('admin/income/view/{slug}', [IncomeController::class, 'view']);
Route::post('admin/income/insert', [IncomeController::class, 'insert']);
Route::post('admin/income/update', [IncomeController::class, 'update']);
Route::post('admin/income/softdelete', [IncomeController::class, 'softdelete']);
//expense category
Route::get('admin/expense/category', [ExpenseCategoryController::class, 'index']);
Route::get('admin/expense/category/add', [ExpenseCategoryController::class, 'add']);
Route::get('admin/expense/category/edit/{slug}', [ExpenseCategoryController::class, 'edit']);
Route::get('admin/expense/category/view/{slug}', [ExpenseCategoryController::class, 'view']);
Route::post('admin/expense/category/insert', [ExpenseCategoryController::class, 'insert']);
Route::post('admin/expense/category/update', [ExpenseCategoryController::class, 'update']);
Route::post('admin/expense/category/softdelete', [ExpenseCategoryController::class, 'softdelete']);
//expense
Route::get('admin/expense', [ExpenseController::class, 'index']);
Route::get('admin/expense/add', [ExpenseController::class, 'add']);
Route::get('admin/expense/edit/{slug}', [ExpenseController::class, 'edit']);
Route::get('admin/expense/view/{slug}', [ExpenseController::class, 'view']);
Route::post('admin/expense/insert', [ExpenseController::class, 'insert']);
Route::post('admin/expense/update', [ExpenseController::class, 'update']);
Route::post('admin/expense/softdelete', [ExpenseController::class, 'softdelete']);
//summary
Route::get('admin/summary', [SummaryController::class, 'index']);
Route::get('admin/custom/summary', [SummaryController::class, 'custom_report']);
Route::get('admin/summary/search/{from}/{to}', [SummaryController::class, 'search']);

require __DIR__.'/auth.php';


