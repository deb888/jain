<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\workcategory;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use DB;
use Image;

class Workcategorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=workcategory::all();
		return view('admin.workcat_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.workcat_add');
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
				'cat_type' => 'required',
				'cat_nm' => 'required',
				'cat_desc' => 'required',
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
			return Redirect::to('/admin/workcategory/add')->withInput()->withErrors($validator);
			}
			else {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/catimage'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			$path = 'uploads/catimage/thumb' . $fileName;
				Image::make($image->getRealPath())->resize(200, 200)->save($path);
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
			 
			//echo $image->getRealPath();die;
			 
				$post= new workcategory;
				$post->cat_type=$request['cat_type'];
				$post->cat_nm=$request['cat_nm'];
				$post->cat_desc=$request['cat_desc'];
				$post->sts=$request['sts'];
				$post->cat_img=$fileName;
				$post->save();
				return redirect()->route('workcategory.index')->with(['success'=>'Inserted Successfully',]);
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
        $data = workcategory::findOrFail($id);
		
		$conunt=workcategory::count();
		$data->count=$conunt;
		$data->all=workcategory::all();
	   return view('admin.workcat_edit')->with('dat',$data);
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
				'cat_type' => 'required',
				'cat_nm' => 'required',
				'cat_desc' => 'required',
				'sts' => 'required',
				
				]); 
				$post = workcategory::findOrFail($request['id']);
				if(Input::file('image')!=''){		
        if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/catimage'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				
				
				$post->cat_img=$fileName;
				
				
				}}
				$post->cat_type=$request['cat_type'];
				$post->cat_nm=$request['cat_nm'];
				$post->cat_desc=$request['cat_desc'];
				$post->sts=$request['sts'];
				
				$post->update();
					
				return redirect()->route('workcategory.index')->with(['success'=>'Updated Successfully',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = workcategory::findOrFail($id);
        $post->delete();
		return redirect()->route('workcategory.index')->with(['success'=>'Delete Successfully',]);
    }
}
