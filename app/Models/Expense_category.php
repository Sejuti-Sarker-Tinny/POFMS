<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense_category extends Model{
    use HasFactory;
    protected $primaryKey = 'excate_id';

    public function creatorDetails(){
      return $this->belongsTo('App\Models\User','excate_creator','id');
    }
}
