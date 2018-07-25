<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Mail;
use App\clientmodel;
use App\emailmodel;
class Client extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=clientmodel::orderBy('id', 'DESC')->get();
		return view('admin.client_list', ['dt' => $data]);
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
       $data = clientmodel::findOrFail($id);
	   return view('admin.client_edit')->with('dat',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $post=clientmodel::find($request['id']);
		if(!$post){
			
			return redirect()->route('clientmanagement.list')->with(['fail'=>'No Record Found']);
			
		}
		$post->first_name=$request['first_name'];
		$post->last_name=$request['last_name'];
		$post->email=$request['email'];
		$post->status=$request['status'];
		$post->phone_no=$request['phone_no'];
		$post->update();
		return redirect()->route('clientmanagement.list')->with(['success'=>'Updated Successfully',]);
		
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
        
		$post=clientmodel::find($id);
            if(!$post){
                
                return redirect()->route('clientmanagement.list')->with(['fail'=>'Not Found Record']);
                
            }
			$post->is_del='1';
            $post->delete();
        
        return redirect()->route('clientmanagement.list')->with(['success'=>'Operation Successful']);
		
    }
	public function change_password(Request $request){
		
			//echo 'Ok';die;
			$insert_arr=$request->all();
			
			
			$this->validate($request, [
				'password' => 'required|confirmed',
				'password_confirmation' => 'required',


				]);
				$post=clientmodel::find($request['id']);
				
				//if(md5($request['oldpassword'])==$post->password){
					
					$post->password=md5($request['password']);
					$post->update();
					$user=clientmodel::find($request['id']);
					$pass=$request['password'];
					//mail send
					$email_content=emailmodel::find(3)->toArray();
					$mailcontent=str_replace("%email%",$user->email,$email_content['email_body']);
					$mailcontent=str_replace("%password%",$pass,$mailcontent);
					
					Mail::send('emails.mailPassword', ['mailcontent'=>$mailcontent,'pass'=>$pass,], function($message) use ($user,$email_content) {
					$message->from('teamcrescentek@gmail.com','Verufie');
					$message->to($user->email);
					$message->cc('wwwdeb888@gmail.com', $name = null);
					$message->subject($email_content['email_subject']);
				});
					
					return redirect()->route('clientmanagement.list')->with(['success'=>'password change success',]);		
					
				/* }else{
					
					return redirect()->route('usermanagement.list')->with(['fail'=>'old password not matched',]);
					
					
				} */
				
						
				
			

				
		
		
		
	}
	
	
	
}
