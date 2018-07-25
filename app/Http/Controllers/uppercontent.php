<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tabluppercontent;
use Validator;
use Redirect;
use DB;

class uppercontent extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tabluppercontent::all();
	return view('admin.pacuppercontent_list', ['dt' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       $data = tabluppercontent::findOrFail($id);
		
		$conunt=tabluppercontent::count();
		$data->count=$conunt;
		$data->all=tabluppercontent::all();
	   return view('admin.pacuppercontent_edit')->with('dt',$data);
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
				'title' => 'required',
				'content' => 'required',
				'seo_title' => 'required',
				'meta_keyword' => 'required',
				'meta_description' => 'required',
				]); 
				$post = tabluppercontent::findOrFail($request['id']);
				if(!$post){
			
			return redirect()->route('aboutus.index')->with(['fail'=>'No Record Found']);
			
		}
				$post->title=$request['title'];
				$post->content=$request['content'];
				
				$post->seo_title=$request['seo_title'];
				$post->meta_keyword=$request['meta_keyword'];
				$post->meta_description=$request['meta_description'];
				
				$post->update();
					
				return redirect()->route('uppercontent.index')->with(['success'=>'Updated Successfully',]);
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
