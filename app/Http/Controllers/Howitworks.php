<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tblhowitworks;
class Howitworks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=tblhowitworks::all();
		return view('admin.howitworks_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.howitworks_add');
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
				'step_one_hed' => 'required',
				'step_one_cont' => 'required',
				'step_two_hed' => 'required',
				'step_two_cont' => 'required',
				'step_three_hed' => 'required',
				'step_thres_cont' => 'required',
				'sts' => 'required',
				
				
				]); 
				//sprint_r($request);die;
				$post=new tblhowitworks;
				//print_r($post);die;
				$post->step_one_hed=$request['step_one_hed'];
				$post->step_one_cont=$request['step_one_cont'];
				$post->step_two_hed=$request['step_two_hed'];
				$post->step_two_cont=$request['step_two_cont'];
				$post->step_three_hed=$request['step_three_hed'];
				$post->step_thres_cont=$request['step_thres_cont'];
				$post->sts=$request['sts'];
				$post->save();
				return redirect()->route('howitworks.index')->with(['success'=>'Inserted Successfully',]);
				
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data = tblhowitworks::findOrFail($id);
	   return view('admin.howitworks_edit')->with('dat',$data);
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
				'step_one_hed' => 'required',
				'step_one_cont' => 'required',
				'step_two_hed' => 'required',
				'step_two_cont' => 'required',
				'step_three_hed' => 'required',
				'step_thres_cont' => 'required',
				'sts' => 'required',
				
				
				]); 
				//sprint_r($request);die;
				$post = tblhowitworks::findOrFail($request['id']);
				//print_r($post);die;
				$post->step_one_hed=$request['step_one_hed'];
				$post->step_one_cont=$request['step_one_cont'];
				$post->step_two_hed=$request['step_two_hed'];
				$post->step_two_cont=$request['step_two_cont'];
				$post->step_three_hed=$request['step_three_hed'];
				$post->step_thres_cont=$request['step_thres_cont'];
				$post->sts=$request['sts'];
				$post->update();
				return redirect()->route('howitworks.index')->with(['success'=>'Updated Successfully',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
