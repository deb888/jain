<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Works;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$data =  Works::where('work_order.is_del','!=','1')->leftJoin('users', function($join) {
      $join->on('users.id', '=', 'work_order.user_id');
    })->select('*','work_order.id AS id','work_order.status As status')->orderBy('work_date', 'DESC')->get();
		
		return view('admin.work_list', ['dt' => $data]);
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
        $data=Works::findOrFail($id);
		return view('admin.workview',['dt'=>$data,]);
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
    public function update(Request $request){		
	$post=Works::findOrFail($request['id']);		
	$files = Input::file('userfile');
	//print_r($request['image_name']);
	//echo "<pre>";print_r($files);die;
	$file_count = count($files);
	
		
		//echo $file_count;die;
		
	
	$arr=array();
	for($x=0;$x < $file_count;$x++){
	        
		$uploadcount = 0;
		$filesx=array();
	for($k=0;$k<count($files[$x]);$k++) {
			
			$i =0;
			
			$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			$validator = Validator::make(array('file'=> $files[$x][$k]), $rules);
			if($files[$x][$k]!=''){
				
				
				
			
			if($validator->passes()){
				$destinationPath = '../work_image';
				$filename = $files[$x][$k]->getClientOriginalName();
				$filesx[$uploadcount]=$filename;
				//array_push($filesx,$filename);
				$upload_success = $files[$x][$k]->move($destinationPath, $filename);
				$uploadcount ++;
			}
			}else{
				
				$filename = $request['image_name'][$x][$k];
				$filesx[$uploadcount]=$filename;
				//echo $request['image_name'][$x][$k];
				$uploadcount ++;
			}
			
		}
		
		
		
		//echo "<br>X : ".$x; 
		//$arr[$x]=$filesx;
		array_push($arr,$filesx);
	}
	//echo "<pre>";print_r($arr);
	//die;
				//if no uploading added
				
				//echo $uploadcount;die;
				
				
				if($uploadcount==0){
					$arr=array();
					for($x=0;$x<count($request['image_name']);$x++){
						$up=0;
						for($k=0;$k<count($request['image_name'][$x]);$k++){
							
							$filename = $request['image_name'][$x][$k];
							$filesx[$up]=$filename;
							$up ++;
						}
						
						
						array_push($arr,$filesx);
						
					}
					
					
				}
				
	
	//echo "<pre>";print_r($arr);
	//die;
	for($i=0;$i<count($request['qty']);$i++){
	$arrrx[$i]=array(
	'qty'=>$request['qty'][$i],
	'size'=>$request['size'][$i],
	'description'=>$request['description'][$i],
	'price'=>$request['qty'][$i]*$request['unit_cost'][$i],
	'unit_cost'=>$request['unit_cost'][$i],
	//'image'=>($files[$i]==null)?$request['image_name'][$i]:$files[$i]->getClientOriginalName(),
	'image'=>(isset($arr[$i])? $arr[$i]:''),
	);

	} 


	$final_arr=serialize($arrrx);	
	$post->job_name=$request['job_name'];
	$post->job_address=$request['job_address'];
	$post->bill_to=$request['bill_to'];
	$post->attention=$request['attention'];
	$post->bill_to_address=$request['bill_to_address'];
	$post->client_phone=$request['client_phone'];
	$post->client_email=$request['client_email'];
	$post->scope_of_work=$request['scope_of_work'];
	$post->work_details=$final_arr;
	$post->update();
	return redirect()->route('Work.list')->with(['success'=>'Updated Successfully',]);
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
		
		$post=Works::find($id);
		
			$arr=unserialize($post->work_details);
			for($i=0;$i<count($arr);$i++){
				
				for($x=0;$x<count($arr[$i]['image']);$x++){
					
					if($arr[$i]['image'][$x] != 'noimage.png'){
					
					@unlink('../work_image/'.$arr[$i]['image'][$x]);
					}
				}
				
			}
		
		
            if(!$post){
                
                return redirect()->route('Work.list')->with(['fail'=>'Not Found Record']);
                
            }
			$post->is_del='1';
            $post->delete();
        
        return redirect()->route('Work.list')->with(['success'=>'Operation Successful']);
		
		
		
	}
	
	
	
	
	public function ajax_call_delete(Request $request){
		
		
		//print_r($request->val);
		
		
		$work_id=array();
		$work_id=explode(',',$request->val);
		print_r($work_id);
		for($i=0;$i<count($work_id);$i++){
			
			$post=Works::find($work_id[$i]);
			$arr=unserialize($post->work_details);
			for($ix=0;$ix<count($arr);$ix++){
				
				for($x=0;$x<count($arr[$ix]['image']);$x++){
					
					if($arr[$ix]['image'][$x] != 'noimage.png'){
					
					@unlink('../work_image/'.$arr[$ix]['image'][$x]);
					}
				}
				
			}
			
			
			$post->is_del='1';
            $post->delete();
			
		}
		echo 1;
		
	}
	public function print_invoice($id){
		
		
		$data=Works::findOrFail($id);
		return view('admin.print',['dt'=>$data,]);
		
		
		
		
	}
	
	
	
}
