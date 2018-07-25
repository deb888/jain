<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tbl_transaction;
use App\frontuser;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use DB;
use Image;
class Customers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=frontuser::all();
        
          /*    $data = DB::table('frontusers')              
                ->leftJoin('tbl_transactions', 'frontusers.id', '=', 'tbl_transactions.user_id')             
                ->orderBy('frontusers.id', 'desc')
                ->distinct()
                ->get();  */
                
                
		return view('admin.customers_list', ['dt' => $data]);
    }

    	
	
}
