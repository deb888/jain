<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use App\tbl_shdlaudit;
use Mail;
use Event;
use DB;
use URL;
//use App\Events\frontsendMail;
use App\Events\SendMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\states;
use App\cities;
use App\Admin;
use App\contactinfo;
use App\Package;

class Scheduleaudit extends Controller
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
        $this->validate($request, [
                                'date' =>  'required',
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required',
				'phone_no' => 'required',
				'address' => 'required',
        	                'city' => 'required',
                                'country' => 'required',

				]);
				
				//$date1 = strtr($request['date'], '/', '-');
				
                                $schd_date =  date("Y-m-d",strtotime($request['date']));
				
				//$schd_date = date("Y-d-m", strtotime(str_replace('/','-',$request['date'])));
				
				$shdlaudit=new tbl_shdlaudit();
				$shdlaudit->shdl_date=$schd_date;
				$shdlaudit->first_name=$request['first_name'];
				$shdlaudit->last_name=$request['last_name'];
				$shdlaudit->email=$request['email'];
				$shdlaudit->phone_no=$request['phone_no'];
				$shdlaudit->address=$request['address'];
                                $shdlaudit->city=$request['city'];
                                $shdlaudit->state=$request['state'];
                                $shdlaudit->country=$request['country'];
                                $shdlaudit->p_id = $request['p_id'];
				$shdlaudit->save();
				Session::set('msg', 'Your Audit is scheduled Successfully');
				
                
                                  $to = $request['email'];

				  $message = 'Thanks for scheduling audit.Your audit is scheduled on '.$request['date'] .'.We will contact  you soon' ;
				
				  $subject = 'CHUCK MEDIA :: Your audit scheduled';
				  
				  $headers = "From: hello@app.com" . "\r\n" ;
                
  
                               Mail::send('auditschedul.frontmailt', ['mailContent1' => $message], function ($m) use ($shdlaudit) {
                               
				$m->from('hello@app.com', 'Your Application');

				$m->to($shdlaudit->email, $shdlaudit->first_name)->subject('Your audit scheduled');  
				
				});
				
				
				$admin =  admin::where('id',1)->get();
				
				$admin=$admin[0];
				
				/*
				echo '<pre>';
				print_r($admin->email);
				die;
				*/
				
				$city =  cities::where('id',$request['city'])->get();
				
				$city = $city[0]->name;
				
				
				$state =  states::where('id',$request['state'])->get();
				
				$state = $state[0]->name;
				
				
				
				 Mail::send('auditschedul.adminmailt', ['date' => $request['date'],'fname' => $request['first_name'],'lname'=>$request['last_name'],'email'=>$request['email'],'phone'=>$request['phone_no'],'address'=>$request['address'],'state'=>$state,'city'=>$city,'country'=>$request['country']], function ($m) use ($admin) {
                               
				$m->from('hello@app.com', 'Your Application');

				$m->to($admin->email)->subject('A new audit is scheduled');  
				
				});
				
			         
				
				//Mail::send($to,$subject,$message,$headers);
				
				$packsch =  Package::where('id',$request['p_id'])->get();
				
				 $contact=contactinfo::where('status','1')->get();
				
				
				
				
                     //    return redirect('/package');
                       
                       return view('frontend.auditscheduledsuccess', ['dt' => $packsch,'contactdata'=>$contact]);

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
}
