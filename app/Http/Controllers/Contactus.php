<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Illuminate\Database\Eloquent\ModelNotFoundException;
	use App\Http\Requests;
	use DB;
	use App\contactinfo;
	use Validator;
	use Redirect;
	use Session;
	use Illuminate\Support\Facades\Input;
class Contactus extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=contactinfo::orderBy('id', 'DESC')->get();
	   return view('admin.contact_list')->with('dt',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
			//grab the model
			$post=new contactinfo();
			//validate te data
			$this->validate($request, [
				
                                'address'=>'required',
				'email'=>'required',
				'emergency_phone' => 'required',
				
				
				
				]); 
				//image upload
			
			
				
			
			$post->address=$request['address'];	
			$post->emergency_phone=$request['emergency_phone'];			
			$post->email=$request['email'];			
			$post->status=$request['status'];
			
			$post->fb_link=$request['fb_link'];
			$post->twt_link=$request['twtr_link'];
			$post->glpl_link=$request['gpgl_link'];
			$post->inst_link=$request['inst_link'];
			$post->lnkd_link=$request['lnkd_link'];
			$post->snpcht_link=$request['snpcht_link'];
			$post->yutb_link=$request['yutb_link'];
				
			$post->save();
			return redirect()->route('contactmanagement.list')->with(['success'=>'Inserted Successfully',]);
			
			
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      try{
				
			$data = contactinfo::findOrFail($id);
			
			}catch(ModelNotFoundException $e){
				//dd(get_class_methods($e)); // lists all available methods for exception object
				//dd($e);
				return Redirect::to('/contactmanagement')->withErrors($e);
				
			}
	   return view('admin.contact_edit')->with('dat',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //upload File
			$id=$request['id'];
			try{
				
			$data = contactinfo::findOrFail($id);
			
			}catch(ModelNotFoundException $e){
				
				return Redirect::to('/contactmanagement')->withInput()->withErrors($e);
				
			}
			
			
			
			
			//}
			
                        $data->address=$request['address'];
                        
			$data->emergency_phone=$request['emergency_phone'];			
			$data->email=$request['email'];			
			$data->status=$request['status'];	
			
			$data->fb_link=$request['fb_link'];
			$data->twt_link=$request['twtr_link'];
			$data->glpl_link=$request['gpgl_link'];
			$data->inst_link=$request['inst_link'];
			$data->lnkd_link=$request['lnkd_link'];
			$data->snpcht_link=$request['snpcht_link'];
			$data->yutb_link=$request['yutb_link'];
			
			$data->seo_title=$request['seo_title'];
			$data->meta_keyword=$request['meta_keyword'];
			$data->meta_description=$request['meta_description'];
			
			
			$data->update();
			
			return redirect()->route('contactmanagement.list')->with(['success'=>'Updated Successfully',]);
    //}
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
		$get=contactinfo::findOrFail($id);
		$get->delete();
		return redirect()->route('contactmanagement.list')->with(['success'=>'Deleted Successfully',]);
	   
	   
	   
    }
}
