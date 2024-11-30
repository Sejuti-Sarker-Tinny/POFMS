<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model{
    use HasFactory;
    protected $primaryKey = 'income_id';

    public function creatorName(){
      return $this->belongsTo('App\Models\User','creator_id','id');
    }

    public function categoryName(){
      return $this->belongsTo('App\Models\Income_category','incate_id','incate_id');
    }
}
