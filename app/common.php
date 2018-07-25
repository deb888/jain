<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class common extends Model
{
	protected $table = 'product_details';
	
	protected $fillable = ['name','price','description'];
    //
}
