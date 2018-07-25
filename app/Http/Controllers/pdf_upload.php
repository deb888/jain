<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use DB;
use Session;

class pdf_upload extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.file_upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // getting all of the post data
			$file = array('image' => Input::file('image'));
			// setting up rules

			// print_r($file) ;die;
			$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
			// doing the validation, passing post data, rules and the messages
			$validator = Validator::make($file, $rules);
			if ($validator->fails()) {
			// send back to the page with the input data and errors
			return Redirect::to('/pdf/Upload')->withInput()->withErrors($validator);
			}
			else {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
			$update_arr=array(

			'file_name'=>Input::file('image')->getClientOriginalName(),


			);
			DB::table('support_file')
			->where('id', 1)
			->update($update_arr);


			Session::flash('success', 'Upload successfully'); 
			return Redirect::to('/pdf/Upload');
			}
    else {
      // sending back with error message.
		Session::flash('fail', 'uploaded file is not valid');
		return Redirect::to('/pdf/Upload');
    }
  }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
