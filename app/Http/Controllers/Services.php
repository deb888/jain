<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use DB;
use Image;

class Services extends Controller
{
  public function index()
    {
        $data=service::all();
		return view('admin.service_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.service_add');
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
				'services_title' => 'required',
				'services_content' => 'required',
				'sts' => 'required',
				
				
				]); 
				$file = array('image' => Input::file('image'));
			// setting up rules
				$image = Input::file('image');
			 //print_r($file) ;die;
			$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
			// doing the validation, passing post data, rules and the messages
			$validator = Validator::make($file, $rules);
			if ($validator->fails()) {
			// send back to the page with the input data and errors
			return Redirect::to('/admin/services/add')->withInput()->withErrors($validator);
			}
			else {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/services'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			$path = 'uploads/services/thumb/' . $fileName;
				Image::make($image->getRealPath())->resize(200, 200)->save($path);
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
			 
			//echo $image->getRealPath();die;
			 
				$post= new service;
				$post->title=$request['services_title'];
				$post->content=$request['services_content'];
				$post->sts=$request['sts'];
				$post->service_image=$fileName;
				$post->save();
				return redirect()->route('services.index')->with(['success'=>'Inserted Successfully',]);
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
        $data = service::findOrFail($id);
		
		$conunt=service::count();
		$data->count=$conunt;
		$data->all=service::all();
	   return view('admin.service_edit')->with('dat',$data);
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
    {
        $this->validate($request, [
				'services_title' => 'required',
				'services_content' => 'required',
				'sts' => 'required',
				
				]); 
				$post = service::findOrFail($request['id']);
				if(Input::file('image')!=''){		
        if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/services'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				
				
				$post->service_image=$fileName;
				
				
				}}
				$post->title=$request['services_title'];
				$post->content=$request['services_content'];
				$post->sts=$request['sts'];
				
				$post->update();
					
				return redirect()->route('services.index')->with(['success'=>'Updated Successfully',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = service::findOrFail($id);
		$post->delete();
		return redirect()->route('services.index')->with(['success'=>'Deleted Successfully',]);
    }
	public function get_data(Request $request){
		 $post = service::findOrFail($request->id);
			$post->order=$request->order_id;
			$post->update();
			echo 1;
		
	}
	
	
}