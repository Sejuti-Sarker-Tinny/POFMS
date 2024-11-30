<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income_category extends Model{
    use HasFactory;
    protected $primaryKey = 'incate_id';

    public function giveme(){
      return $this->belongsTo('App\Models\User','incate_creator','id');
    }
}
