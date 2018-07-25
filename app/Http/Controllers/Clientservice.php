<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientservice_model;
use App\Http\Requests;
use Mail;
use App\emailmodel;
class Clientservice extends Controller
{
    
    public function index()
    {
       $data =  Clientservice_model::leftJoin('client', function($join) {
      $join->on('client.id', '=', 'clientservices.user_id');
		})->select('*','clientservices.id AS id','clientservices.status As status','clientservices.client_email As email','clientservices.client_name As name','clientservices.client_phone As phone','clientservices.created_at as created_at')->orderBy('clientservices.created_at', 'DESC')->get();
		
		return view('admin.clientservice_list', ['dt' => $data]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {	$data=Clientservice_model::findorFail($id);
        return view('admin.service_info', ['dt' => $data]);
        
    }

    
    public function edit($id)
    {
        
    }

   
    public function update(Request $request)
    {		$id=$request['id'];
			$data=Clientservice_model::findorFail($id);
			//image upload
			
			/****************************************/
			
			$data->address=$request['address'];
			$data->what_issue=$request['what_issue'];
			$data->notes=$request['notes'];
			$data->client_name=$request['client_name'];
			$data->client_email=$request['client_email'];
			$data->client_phone=$request['client_phone'];
			$data->status=$request['status'];
			$data->action_date=time();
			$data->update();
			//mail send
			if($request['status']==1){
				
				
			
					$get_up_data=Clientservice_model::findorFail($id);
					$email_content=emailmodel::find(5)->toArray();
					$mailcontent=str_replace("%client_name%",$request['client_name'],$email_content['email_body']);
					$mailcontent=str_replace("%Client_phone%",$request['client_phone'],$mailcontent);
					$mailcontent=str_replace("%Client_email%",$request['client_email'],$mailcontent);
					$mailcontent=str_replace("%app_date%",date('d/m/Y',$get_up_data->action_date),$mailcontent);
					
					Mail::send('emails.mailPassword', ['mailcontent'=>$mailcontent], function($message) use ($get_up_data,$email_content) {
					$message->from('teamcrescentek@gmail.com','Verufie');
					$message->to($get_up_data->client_email);
					$message->cc('wwwdeb888@gmail.com', $name = null);
					$message->subject($email_content['email_subject']);	
					});
		}
			return redirect()->route('clientservice.list')->with(['success'=>'Updated Successfully',]);
			
			
			
			
			
    }

    public function destroy($id)
    {	
       $post=Clientservice_model::find($id);
	   $post->is_del='1';
       $post->delete();
	   return redirect()->route('clientservice.list')->with(['success'=>'Delete Successfully',]);
			
    }
	public function ajax_call_delete(Request $request){
		
		
		//print_r($request->val);
		
		
		$work_id=array();
		$work_id=explode(',',$request->val);
		print_r($work_id);
		for($i=0;$i<count($work_id);$i++){
			
			$post=Clientservice_model::find($work_id[$i]);
			$arr=unserialize($post->work_details);
			for($ix=0;$ix<count($arr);$ix++){
				
				for($x=0;$x<count($arr[$ix]['image']);$x++){
					
					if($arr[$ix]['image'][$x] != 'noimage.png'){
					
					@unlink('../service_image/'.$arr[$ix]['image'][$x]);
					}
				}
				
			}
			
			
			$post->is_del='1';
            $post->delete();
			
		}
		echo 1;
		
	}
	public function print_invoice($id){
		
		
		$data=Clientservice_model::findorFail($id);
        return view('admin.service_info_print', ['dt' => $data]);
		
		
		
		
	}
	
	
	
}
