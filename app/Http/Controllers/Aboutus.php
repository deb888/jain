<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\about;
use App\aboutcatmodel;
use App\contactinfo;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use DB;
use Image;


class Aboutus extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=about::paginate(5);
       $contact=contactinfo::where('status','1')->get();
		return view('admin.about_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutcat=aboutcatmodel::all();
        return view('admin.about_add',['cat'=>$aboutcat]);
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

        $this->validate($request, [
            'page_content' => 'required',
           'aboutcat'=>'required'
            
            ]); 
            $post= new about;
            if(Input::file('image')!=''){	
                if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/aboutus'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				
				
				$post->aboutimage=$fileName;
                                
				
				
				}}
            $post->page_content=$request['page_content'];
            $post->aboutcat=$request['aboutcat'];
            $post->our_partner_botton_content = 'blank';

            $post->seo_title='blank';
            $post->meta_keyword='blank';
            $post->meta_description='blank';
                
		$post->save();
		return redirect()->route('aboutus.index')->with(['success'=>'Insert Successfully',]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post=about::find($id);
       $aboutcat=aboutcatmodel::all();
		
		if(!$post){
			
			return redirect()->route('aboutus.index')->with(['fail'=>'No Record Found']);
			
		}
		
		return view('admin.about_edit',['dt'=>$post,'cat'=>$aboutcat]);
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
        'page_content' => 'required',
       
        'seo_title' => 'required',
	'meta_keyword' => 'required',
	'meta_description' => 'required',
        
		]); 
	
	
	
        $post=about::find($request['post_id']);
		if(!$post){
			
			return redirect()->route('aboutus.index')->with(['fail'=>'No Record Found']);
			
		}
                if(Input::file('image')!=''){	
                if (Input::file('image')->isValid()) {
			$destinationPath = 'uploads/aboutus'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			// sending back with message
				
				
				$post->aboutimage=$fileName;
                                
				
				
				}}
		$post->page_content=$request['page_content'];
        $post->our_partner_botton_content = 'blank';
                
                $post->seo_title=$request['seo_title'];
		$post->meta_keyword=$request['meta_keyword'];
		$post->meta_description=$request['meta_description'];
                
		$post->update();
		return redirect()->route('aboutus.index')->with(['success'=>'Updated Successfully',]);
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
