<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Package;
use App\contactinfo;
use Validator;
use Redirect;
use DB;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
class Packagecpntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=Package::all();
      $contact=contactinfo::where('status','1')->get();
      return view('admin.pac_list', ['dt' => $data,'contactdata'=>$contact]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uppercontent()
   {
      $data=contactinfo::all();
      return view('admin.pac_uppercontent_list', ['dt' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.pac_add');
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
     'info' => 'required',
     'pac_nm' => 'required',
     'pro_crick' => 'required',

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
   return Redirect::to('/admin/pac/add')->withInput()->withErrors($validator);
   }
   else {
   // checking file is valid.
   if (Input::file('image')->isValid()) {
   $destinationPath = 'uploads/pac'; // upload path
   $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
   $fileName = rand(11111,99999).'.'.$extension; // renameing image
   $path = 'uploads/pac/thumb/' . $fileName;
     Image::make($image->getRealPath())->resize(200, 200)->save($path);
   Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
   // sending back with message

   //echo $image->getRealPath();die;

     $post= new Package;
     $post->info=$request['info'];
     $post->pac_nm=$request['pac_nm'];
     $post->pro_crick=$request['pro_crick'];
     $post->pac_prc=10.0;
     $post->sts=$request['sts'];
     $post->img_nm=$fileName;
     $post->save();
     return redirect()->route('pac.index')->with(['success'=>'Inserted Successfully',]);
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
        $data = Package::findOrFail($id);
		
		$conunt=Package::count();
		$data->count=$conunt;
		$data->all=Package::all();
	   return view('admin.pac_edit')->with('dat',$data);
    }
    
    
    public function showuppercontent($id)
    {
        $data = contactinfo::findOrFail($id);
		
		$conunt=contactinfo::count();
		$data->count=$conunt;
		$data->all=contactinfo::all();
	   return view('admin.pacuppercontent_edit')->with('dat',$data);
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
                            'info' => 'required',
                            'pac_nm' => 'required',
                            'pro_crick' => 'required',
                            'sts' => 'required',
                         ]);
		 $post = Package::findOrFail($request['id']);
				if(Input::file('image')!=''){		
                        if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/pac'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				
				
				$post->img_nm=$fileName;
				
				
				}}
				$post->info=$request['info'];
                                $post->pac_nm=$request['pac_nm'];
                                $post->pro_crick=$request['pro_crick'];
                                $post->pac_prc=20.0;
                                $post->sts=$request['sts'];
				
				$post->update();
					
				return redirect()->route('pac.index')->with(['success'=>'Updated Successfully',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Package::findOrFail($id);
		$post->delete();
		return redirect()->route('pac.index')->with(['success'=>'Deleted Successfully',]);
    }
}
