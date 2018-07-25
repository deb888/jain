<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tbltestimonial;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use DB;
use Session;
class Testimonial extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data=tbltestimonial::all();
		return view('admin.testimonial_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.testimonial_create');
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
				'topic_name' => 'required',
				'topic_description' => 'required',
				'topic_person_name' => 'required',
				'topicperson_location' => 'required',
				'topicperson_designation' => 'required',
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
			return Redirect::to('/admin/testimonial/add')->withInput()->withErrors($validator);
			}
			else {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				$destinationPath = 'uploads'; // upload path
			$extension = Input::file('image1')->getClientOriginalExtension(); // getting image extension
			$fileName1 = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image1')->move($destinationPath, $fileName1);
				$post= new tbltestimonial;
				$post->topic_name=$request['topic_name'];
				$post->topic_description=$request['topic_description'];
				$post->topic_person_name=$request['topic_person_name'];
				$post->topicperson_location=$request['topicperson_location'];
				$post->topicperson_designation=$request['topicperson_designation'];
				$post->sts=$request['sts'];
				$post->topicperson_image=$fileName;
				$post->bckground_image=$fileName1;
				$post->save();
				return redirect()->route('testimonial.index')->with(['success'=>'Inserted Successfully',]);
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
       $data = tbltestimonial::findOrFail($id);
	   return view('admin.testimonial_edit')->with('dat',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
				'topic_name' => 'required',
				'topic_description' => 'required',
				'topic_person_name' => 'required',
				'topicperson_location' => 'required',
				'topicperson_designation' => 'required',
				'sts' => 'required',
				
				
				]); 
			$post = tbltestimonial::findOrFail($request['id']);	
			//print_r(Input::file('image'));die;
			
			if(Input::file('image')!=''){
				$destinationPath = 'uploads'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				$post->topicperson_image=$fileName;
			}else{
				
				$post->topicperson_image=$request['old_image'];
				
			}
			if(Input::file('image1')!=''){
				$destinationPath = 'uploads'; // upload path
			$extension = Input::file('image1')->getClientOriginalExtension(); // getting image extension
			$fileName1 = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image1')->move($destinationPath, $fileName1);
			$post->bckground_image=$fileName1;
			}else{
				
				$post->bckground_image=$request['old_back_image'];
			}	
				$post->topic_name=$request['topic_name'];
				$post->topic_description=$request['topic_description'];
				$post->topic_person_name=$request['topic_person_name'];
				$post->topicperson_location=$request['topicperson_location'];
				$post->topicperson_designation=$request['topicperson_designation'];
				$post->sts=$request['sts'];
				
				
				
				
				
				$post->update();
				return redirect()->route('testimonial.index')->with(['success'=>'Updated Successfully',]);
			
				
				
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = tbltestimonial::findOrFail($id);	
		$post->delete();
		return redirect()->route('testimonial.index')->with(['success'=>'Deleted Successfully',]);
    }
}
