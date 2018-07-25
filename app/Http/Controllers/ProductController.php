<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\common;

class ProductController extends Controller
{
    
    public function index()
    {
		$data = common::paginate(5);

        return view('admin.product_list')->with('dt',$data);;
    }

    
    public function create()
    {
        return view('admin.product_create');
    }
	
	 public function store(Request $request)
    {
		$data = $request->all();;
		common::create($data);
		
		return redirect()->route('product.index');
    }
	
	 public function edit($id)
    {
        $data = common::findOrFail($id);

		return view('admin.product_edit')->with('dat',$data);
    }
	
	public function update(Request $request, $id)
    {
        $data = common::findOrFail($id);

		$input = $request->all();

		$data->fill($input)->save();

		return redirect()->back();
    }
	
	public function show($id)
    {
        //
    }
	
	 public function destroy($id)
    {
       $data = common::findOrFail($id);
	   print_r($data);exit;

		$data->delete();

		return redirect()->route('product.index');
    }
  
}
