<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tblourpartner;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use DB;
class Ourpartner extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tblourpartner::all();
		return view('admin.ourpartner_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.ourpartner_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
				'partner_name' => 'required',
				'sts' => 'required',
				
				
				]); 
				$file = array('image' => Input::file('image'));
			// setting up rules

			// print_r($file) ;die;
			$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
			// doing the validation, passing post data, rules and the messages
			$validator = Validator::make($file, $rules);
			if ($validator->fails()) {
			// send back to the page with the input data and errors
			return Redirect::to('/admin/ourpartner/add')->withInput()->withErrors($validator);
			}
			else {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/partner'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				$post= new tblourpartner;
				$post->partner_name=$request['partner_name'];
				$post->sts=$request['sts'];
				$post->partner_image_name=$fileName;
				$post->save();
				return redirect()->route('ourpartner.index')->with(['success'=>'Inserted Successfully',]);
			}
    }
				
				
				
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$data = tblourpartner::findOrFail($id);
	   return view('admin.ourpartner_edit')->with('dat',$data);
	   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {	 $this->validate($request, [
				'partner_name' => 'required',
				'sts' => 'required',
				]); 
				$post = tblourpartner::findOrFail($request['id']);
				if(Input::file('image')!=''){		
        if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/partner'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				
				
				$post->partner_image_name=$fileName;
				
				
				}}
				$post->partner_name=$request['partner_name'];
				$post->sts=$request['sts'];
				$post->update();
					
				return redirect()->route('ourpartner.index')->with(['success'=>'updated Successfully',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = tblourpartner::findOrFail($id);
		$post->delete();
		return redirect()->route('ourpartner.index')->with(['success'=>'Deleted Successfully',]);
    }
	public function get_data(Request $request){
		 $post = tblourpartner::findOrFail($request->id);
			$post->orderx=$request->order_id;
			$post->update();
			echo 1;
		
	}
	
	
}
