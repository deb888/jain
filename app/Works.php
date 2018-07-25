<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
   protected $table = 'work_order';
   
   
   public function users()
    {
        return $this->belongsTo('users');
    }
   
}
