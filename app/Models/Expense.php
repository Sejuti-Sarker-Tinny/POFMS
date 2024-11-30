<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model{
    use HasFactory;
    protected $primaryKey = 'expense_id';

    public function creatorName(){
      return $this->belongsTo('App\Models\User','creator_id','id');
    }

    public function categoryName(){
      return $this->belongsTo('App\Models\Expense_category','excate_id','excate_id');
    }
}
