<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\job;
use Validator;

class jobs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		 
		 $data=job::orderBy('id', 'DESC')->get();

		 

        return view('admin.jobs_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			//only storing data
				$this->validate($request, [
				'job_title' => 'required',
				'manager_name' => 'required',
				'phone_no' => 'required|numeric',
				'manager_co_info' => 'required',
				'codes' => 'required',
				'status' => 'required',
				'manager_email' => 'required',
				
				]); 
			
			$insert_arr=$request->all();
			
			$add=array(
			
				'job_title'=>$insert_arr['job_title'],
				'manager_name'=>$insert_arr['manager_name'],
				'phone_no'=>$insert_arr['phone_no'],
				'manager_email'=>$insert_arr['manager_email'],
				'ap_email'=>$insert_arr['ap_email'],
				'manager_co_info'=>$insert_arr['manager_co_info'],
				'codes'=>$insert_arr['codes'],
				'status'=>$insert_arr['status'],
				
			
			);
			
			DB::table('jobs')->insert(
    [$add]
);
			
			return redirect()->route('jobs.index')->with(['success'=>'Inserted Successfully',]);
			
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
	   $data = job::findOrFail($id);
	   return view('admin.jobs_edit')->with('dat',$data);
	  
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
        $data = job::findOrFail($id);
		$this->validate($request, [
				'job_title' => 'required',
				'manager_name' => 'required',
				'phone_no' => 'required|numeric',
				'manager_co_info' => 'required',
				'codes' => 'required',
				'status' => 'required',
				
				]); 
		$insert_arr=$request->all();
			
			$update_arr=array(
			
				'job_title'=>$insert_arr['job_title'],
				'manager_name'=>$insert_arr['manager_name'],
				'phone_no'=>$insert_arr['phone_no'],
				'manager_email'=>$insert_arr['manager_email'],
				'ap_email'=>$insert_arr['ap_email'],
				'manager_co_info'=>$insert_arr['manager_co_info'],
				'codes'=>$insert_arr['codes'],
				'status'=>$insert_arr['status'],
				
			
			);
		
		
		DB::table('jobs')
            ->where('id', $id)
            ->update($update_arr);
		return redirect()->route('jobs.index')->with(['success'=>'Updated Successfully',]);
			
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;die;
    }
	public function delet_job($id){
		
			$post=job::find($id);
			if(!$post){
				
				return redirect()->route('jobs.index')->with(['fail'=>'Not Found Record']);
				
			}
			$post->delete();
		
		return redirect()->route('jobs.index')->with(['success'=>'Operation Successful']);
	}
}
