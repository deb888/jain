<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\terms_and_conditions;

class terms_and_condition extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	  
		//$terms= new terms_and_condition();
		$data=terms_and_conditions::paginate(5);
		return view('admin.terms_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo 'ok load view';
		
		return view('admin.terms_create');
		
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
        'content' => 'required',
        
    ]); 
	
			$post=new terms_and_conditions();
			$post->content=$request['content'];
			$post->save();
			$request->session()->flash('alert-success', 'User was successful added!');
			return redirect()->route('terms_and_condition.index')->with(['success'=>'Inserted Successfully',]);
			
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
        $post=terms_and_conditions::find($id);
		
		if(!$post){
			
			return redirect()->route('terms_and_condition.index')->with(['fail'=>'No Record Found']);
			
		}
		
		return view('admin.terms_edit',['dt'=>$post]);
		
		
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
        'content' => 'required',
        
		]); 
	
	
	
        $post=terms_and_conditions::find($request['post_id']);
		if(!$post){
			
			return redirect()->route('terms_and_condition.index')->with(['fail'=>'No Record Found']);
			
		}
		$post->content=$request['content'];
		$post->update();
		return redirect()->route('terms_and_condition.index')->with(['success'=>'Updated Successfully',]);
		
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
	
	public function delete_job($id){
		
		
		$post=terms_and_conditions::find($id);
			if(!$post){
				
				return redirect()->route('terms_and_condition.index')->with(['fail'=>'Not Found Record']);
				
			}
			$post->delete();
		
		return redirect()->route('terms_and_condition.index')->with(['success'=>'Operation Successful']);
		
		
	}
}
