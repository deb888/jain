<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tblbanner;
use App\aboutcatmodel;
use App\tblhowitworks;
use App\tblourpartner;
use App\tbltestimonial;
use App\about;
use App\tblcms;
use App\Estimate;
use App\workcategory;
use App\Service;
use App\contactinfo;
use App\Package;
use Image;
use PDF;
class Home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//get all ralivent data

		$data=tblbanner::where('sts','1')->get();		
		$data->banner=$data;
		$howitworks=tblhowitworks::where('sts','1')->get();
		$data->howitworks=$howitworks;
		$partner=tblourpartner::where('sts','1')->orderBy('orderx','ASC')->get();
		$tbltestimonial=tbltestimonial::where('sts','1')->get();
        $about=about::where('sts','1')->get();
        $aboutcatmodel=aboutcatmodel::all();
		$cms=tblcms::where('sts','1')->get();
		$data->partner=$partner;
		$data->about=$about;
		$data->cms=$cms;
		$data->tbltestimonial=$tbltestimonial;
                $service=service::where('sts','1')->get();
                $contact=contactinfo::where('status','1')->get();
                $pacdata=Package::where('sts','1')->get();
		return view('frontend.index',['dt' => $data,'aboutdata'=>$about,'aboutcatdata'=>$aboutcatmodel,'servicedata'=>$service,'pacdata'=>$pacdata,'contactdata'=>$contact]);
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
        //
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
        //
    }
	//cms level all function
	public function developer(){
		
		return view('frontend.develope');
		
		
	}
	public function exterior(){
		
		$data=workcategory::where('cat_type','1')->orderBy('id','ASC')->get();	
		
		return view('frontend.exterior',['extdata'=>$data,]);
		
		
	}
	public function interior(){
		
		$data=workcategory::where('cat_type','2')->orderBy('id','ASC')->get();	
		
		return view('frontend.exterior',['extdata'=>$data,]);
		
		
	}
	public function about($id){
        $aboutid=aboutcatmodel::where('slug',$id)->get();
       // print_r($aboutid);die;
        $about=about::where('sts','1')->where('aboutcat',$aboutid[0]->id)->get();
        $aboutcatmodel=aboutcatmodel::all();
        
                $partner=tblourpartner::where('sts','1')->get();
                $contact=contactinfo::where('status','1')->get();
		return view('frontend.about',['aboutdata'=>$about,'partners'=>$partner,'contactdata'=>$contact,'aboutcatdata'=>$aboutcatmodel]);
		
		
	}
	public function pdf_test(){
		$data='';
		$pdf = PDF::loadView('pdf.invoice', $data);
	return $pdf->download('invoice.pdf');
		
	}
	
}
