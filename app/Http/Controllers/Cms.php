<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tblcms;
class Cms extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tblcms::all();
		return view('admin.cms_list', ['dt' => $data]);
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
        $data = tblcms::findOrFail($id);
		return view('admin.cms_edit')->with('dt',$data);
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
				'howitworks_tagline' => 'required',
				'testimonial_tagline' => 'required',
				'ourpartner_tagline' => 'required',
				'sts' => 'required',
				
				
				]); 
				//sprint_r($request);die;
				$post = tblcms::findOrFail($request['id']);
				//print_r($post);die;
				$post->howitworks_tagline=$request['howitworks_tagline'];
				$post->testimonial_tagline=$request['testimonial_tagline'];
				$post->ourpartner_tagline=$request['ourpartner_tagline'];
			
				
				$post->sts=$request['sts'];
				$post->update();
				return redirect()->route('cms.index')->with(['success'=>'Updated Successfully',]);
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
