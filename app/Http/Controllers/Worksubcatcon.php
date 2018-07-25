<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Worksubcat;
use App\workcategory;
class Worksubcatcon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=Worksubcat::all();
		 $data =  Worksubcat::leftJoin('workcategories', function($join) {
      $join->on('workcategories.id', '=', 'worksubcats.id');
		})->select('*','worksubcats.id AS id','worksubcats.created_at as created_at')->orderBy('worksubcats.created_at', 'DESC')->get();
		
		return view('admin.workcatsub_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {		$data=workcategory::all();
          return view('admin.workcatsub_add',['dt' => $data]);
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
				'cat_id' => 'required',
				'sub_desc' => 'required',
				]); 
			$post= new 	Worksubcat();
			$post->cat_id=$request['cat_id'];
			$post->sub_desc=$request['sub_desc'];
			$post->save();
			return redirect()->route('worksubcatcon.index')->with(['success'=>'Inserted Successfully',]);
				
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=workcategory::all();
		$sub_data=Worksubcat::findOrFail($id);
        return view('admin.workcatsub_edit',['dt' => $data,'sub_data'=>$sub_data,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         echo 'ok Edit Post';
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
				'cat_id' => 'required',
				'sub_desc' => 'required',
				]); 
			$post= worksubcat::findOrFail($request['id']);
			$post->cat_id=$request['cat_id'];
			$post->sub_desc=$request['sub_desc'];
			$post->update();
			return redirect()->route('worksubcatcon.index')->with(['success'=>'Updated Successfully',]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= worksubcat::findOrFail($id);
		$post->delete();
		return redirect()->route('worksubcatcon.index')->with(['success'=>'Deleted Successfully',]);
    }
}
