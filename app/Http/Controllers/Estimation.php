<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Estimate;
use App\estimatedetails;
use App\workcategory;
use App\work_project;
use DB;
use PDF;
class Estimation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {	
		
	
		if($request['ins_id']==''){
		   
		$pro=new work_project();
		//$pro->estimate_id=$post->id;
		$pro->pro_nm=time().'project';
		$pro->user_id=Auth::guard('frontuser')->user()->id;
		$pro->save(); 
		     
		  $post=new Estimate();
	   $post->first_des=$request['first_des'];
	   $post->user_id=Auth::guard('frontuser')->user()->id;
	   $post->cat_id=$request['id'];
	   $post->tot_price=$request['tot_price'];
	   $post->unit_price=$request['unit_price'];
	   $post->width=$request['width'];
	   $post->pro_id=$pro->id;
	   $post->height=$request['height'];
	   $post->save();
	  // return response()->json($request);
	   $spec_des=$request['spec_des']; 
	   $sub_id=$request['sub_id']; 
	    if(!empty($sub_id[0])){
	   for($i=0;$i<count($sub_id);$i++){
		   
		   $postx= new estimatedetails();
		   $postx->estimate_id=$post->id;
		   $postx->cat_id=$request['id'];
		   $postx->spec_des=$spec_des[$i];
		   $postx->sub_id=$sub_id[$i];
		   $postx->pro_id=$pro->id;
		   $postx->save();
		   
		   
	    }
	    }
	   //under project namespace  
		   
	   }else{
		   
		   
		 $post=new Estimate();
	   $post->first_des=$request['first_des'];
	   $post->user_id=Auth::guard('frontuser')->user()->id;
	   $post->cat_id=$request['id'];
	   $post->tot_price=$request['tot_price'];
	   $post->unit_price=$request['unit_price'];
	   $post->width=$request['width'];
	   $post->pro_id=$request['ins_id'];
	   $post->height=$request['height'];
	   $post->save();
	  // return response()->json($request);
	   $spec_des=$request['spec_des']; 
	   $sub_id=$request['sub_id']; 
	    if(!empty($sub_id[0])){
	   for($i=0;$i<count($sub_id);$i++){
		   
		   $postx= new estimatedetails();
		   $postx->estimate_id=$post->id;
		   $postx->cat_id=$request['id'];
		   $postx->spec_des=$spec_des[$i];
		   $postx->sub_id=$sub_id[$i];
		   $postx->pro_id=$request['ins_id'];
		   $postx->save();
		   
		   
	    }
	    }
	   //under project namespace  
		   
	   }
	
	
		
	   if($request['ins_id'] != ''){
		   
		$estidata=Estimate::where('pro_id',$request['ins_id'])->orderBy('id','ASC')->get();
			$cat_dd=array();
			foreach($estidata as $cat_id){
				
				array_push($cat_dd,$cat_id['cat_id']);
				
			}   
		   
	   }else{
		   $estidata=Estimate::where('pro_id',$pro->id)->orderBy('id','ASC')->get();
			$cat_dd=array();
			foreach($estidata as $cat_id){
				
				array_push($cat_dd,$cat_id['cat_id']);
				
			}   
		   
	   }
	   
			
		   
		   $data=workcategory::where('id',$request['id'])->orderBy('id','ASC')->get();	
		    
			foreach($data as $val){
				
				if($val->cat_type==1){
			   
			 $datax=workcategory::where('cat_type','1')->orderBy('id','ASC')->get();	   
			   
		   }else{
			   
			   $datax=workcategory::where('cat_type','2')->orderBy('id','ASC')->get(); 
		   }
				
			}
		   
		
	   
	   
	   
	   
	   $res='<section class="ex-service" id="gfg">
	<div class="container">
    	<div class="row">
        	<h2>SELECT FROM THE LIST BELOW.</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span class="spn_tst"><a href="'.url('/get_work').'/'. Auth::guard('frontuser')->user()->id.'"><i class="fa fa-user" aria-hidden="true"></i> Details Work</a></span>
	</p>
			
        </div>
        <div class="row ex-service-list after-calculate">
        	<ul>
            	';
				
				foreach($datax as $index=>$val){
					
					
				
				$res.='<li>
                    <div class="col-lg-2">
                        <div class="list-numb">';
						$res.=$index+ 1 ;
						$res.='</div>';
						$res.='<img class="desaturate" src="'.url('uploads/catimage').'/'.$val->cat_img.'" alt="" />';
					$res.='
                    </div>
                    <div class="col-lg-7">
                        <h3>'.$val->cat_nm.'</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						
                    </div>
                    <div class="col-lg-3">
                        <p>
                        	';
							
							if(in_array($val['id'],$cat_dd)){
								
							
							$res.='<span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Done</span>';
							}else{
								$res.='<a class="add"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Proceed</a><input type="hidden" value="'.$val->id.'"/><input type="hidden" value="'.$val->cat_nm.'"/>';
						
								
							}
							$res.='
                        </p>
                    </div>
                </li>';
				}
	   
	   $res.=' 
            </ul>
        </div>
    </div>
</section>';
//return response()->json($datax);die; 


	    if($request['ins_id']==''){
			$arr=array(
			'res'=>$res,
			'ins_id'=>$pro->id,
			);	
		  
					
		}else{
			
			$arr=array(
			'res'=>$res,
			'ins_id'=>$request['ins_id'],
			);
			
		}
		  
		   
	   return response()->json($arr); 
		   
	 
	   
	   
	   
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
       //echo $id;
	   $estimatdata=Estimate::where('estimates.pro_id',$id)->leftJoin('workcategories', function($join) {
      $join->on('estimates.cat_id', '=', 'workcategories.id');
    })->select('*','estimates.id AS id','estimates.created_at As created_at','estimates.updated_at As updated_at')->orderBy('estimates.id', 'DESC')->get();
	   
	  
	  $estimatedetails =  Estimate::where('estimates.pro_id',$id)->leftJoin('estimatedetails', function($join) {
      $join->on('estimatedetails.cat_id', '=', 'estimates.cat_id');
    })->select('*','estimates.id AS id','estimates.created_at As created_at','estimates.updated_at As updated_at')->orderBy('estimates.id', 'DESC')->get();
	   
	    return view('frontend.editestimate',['dt'=>$estimatdata,'estimatedetails'=>$estimatedetails,]);
		//$pdf = PDF::loadView('frontend.estimatecalculate', ['dt'=>$data,'datax'=>$datax,'cat_data'=>$cat_data,]);
		//return $pdf->download('invoice.pdf');
		
    }

   public function get_work($id){
	   
	  
	$estidata=work_project::where('user_id',$id)->orderBy('id','DESC')->get();
	return view('frontend.work_project',['dt'=>$estidata,]);
   }
   public function get_work_details($id){
	   
	   $estimate=Estimate::where('id',$id)->get();
	  $estimatedetails =  estimatedetails::where('estimatedetails.estimate_id',$id)->leftJoin('worksubcats', function($join) {
      $join->on('worksubcats.id', '=', 'estimatedetails.sub_id');
    })->select('*','estimatedetails.id AS id','estimatedetails.created_at As created_at','estimatedetails.updated_at As updated_at')->orderBy('estimatedetails.id', 'DESC')->get();
	    return view('frontend.editestimatedetails',['estimate'=>$estimate,'estimatedetails'=>$estimatedetails,]);
	   
	   
   }
   public function edit_post(Request $request){
	   
	   
	   
	   $post=Estimate::findorFail($request['id']);
	    
	   $post->first_des=$request['first_des'];
	   $post->user_id=Auth::guard('frontuser')->user()->id;

	   $post->tot_price=$request['tot_price'];
	   $post->unit_price=$request['unit_price'];
	   $post->width=$request['width'];
	   
	   $post->height=$request['height'];
	   $post->update();
	   
	   DB::table('estimatedetails')->where('estimate_id', $request['id'])->delete();
	  
	   $spec_des=$request['spec_des']; 
	   $sub_id=$request['sub_id']; 
	    if(!empty($sub_id[0])){
	   for($i=0;$i<count($sub_id);$i++){
		   
		   $postx= new estimatedetails();
		   $postx->estimate_id=$request['id'];
		  
		   $postx->spec_des=$spec_des[$i];
		   $postx->sub_id=$sub_id[$i];
		   $postx->pro_id=$request['ins_id'];
		   $postx->save();
		   
		   
	    }
	    }
	   echo json_encode($post); die;
	  
   }
   public function get_pdf($id){
	   
	 $estimatewithcat =  Estimate::where('estimates.pro_id',$id)->leftJoin('workcategories', function($join) {
      $join->on('workcategories.id', '=', 'estimates.cat_id');
    })->select('*','workcategories.id AS id','estimates.created_at As created_at','estimates.updated_at As updated_at')->orderBy('estimates.id', 'DESC')->get();
	
	   $estimatewithcatsub =  estimatedetails::where('estimatedetails.pro_id',$id)->leftJoin('worksubcats', function($join) {
      $join->on('worksubcats.id', '=', 'estimatedetails.sub_id');
    })->select('*','worksubcats.cat_id AS id','estimatedetails.created_at As created_at','estimatedetails.updated_at As updated_at')->orderBy('estimatedetails.id', 'DESC')->get();
	 
	  $pdf = PDF::loadView('frontend.get_pdfx', ['estimatewithcat'=>$estimatewithcat,'estimatewithcatsub'=>$estimatewithcatsub,]);
		$p_nm='invoice'.time().'.pdf';
		return $pdf->download($p_nm); 
   }
   
}
