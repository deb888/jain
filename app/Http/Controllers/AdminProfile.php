<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Admin;
use DB;
use URL;
use Event;
use Mail;
use Session;
use Illuminate\Routing\UrlGenerator;
use App\Events\SendMail;
use Illuminate\Support\Facades\Hash;
class AdminProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }
	 
	 
    public function index()
    {	$id=Auth::user()->id;
        $data = Admin::findOrFail($id);
		return view('admin.profile',['dt'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {			$insert_arr=$request->all();
				if($insert_arr['oldpassword']!=''){

				$this->validate($request, [
				'oldpassword' => 'required',
				'password' => 'required',
				'conpassword' => 'required',


				]); 

				$id='1';
			 $oldpassword=bcrypt($insert_arr['oldpassword']);
				
				
				
				
				//$admin = Admin::where('passeword', $oldpassword)->findOrFail($id);
					$admin = Admin::findOrFail($id);
				
				
				
				if (Hash::check($insert_arr['oldpassword'], $admin->password)) {
    

				
				
					$admin->password=bcrypt($insert_arr['conpassword']);
					$admin->update();
					
				}else{
					
					
					return redirect()->route('profile.index')->with(['fail'=>'Old Password Not  Match',]);
					
				}
				
				
				

				}else{
					
					$id='1';
				$admin = Admin::findOrFail($id);
				$admin->name=$insert_arr['name'];
				$admin->update();
					
				}
				
			return redirect()->route('profile.index')->with(['success'=>'Updated Successfully',]);
				
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
public function send_reset_link(Request $request){
		
							//get the data  
$id='1';		
$this->validate($request,[

'email'=>'required|email',


]);		



$email=$request['email'];

$admin = Admin::findOrFail($id);		

if($email==$admin->email){

$insert_array=array(

'email'=>$admin->email,
'token'=>time().rand(10000,99999),


);
$id = DB::table('password_resets')->insertGetId(


['email'=>$admin->email,'token'=>$insert_array['token'],]
);

$message='Clik The Below LInk';
$verify_url="<a style='color:blue;font-weight:normal;' href='".URL::to('/')."/mailverification/".$insert_array['token']."/".$insert_array['email']."'>click here</a>";

//echo $send_body="<p>Click This Link ".$verify_url." </p>";die;

Event::fire(new SendMail($admin,$verify_url));
session()->flash('msg','Hey, You have a message to read');
return redirect('/admin/login')->with(['success','Password Verification Mail send To your account Please Check Your Email',]);

}	

		
		
		
	}
	
	
public function mailverification($token,$id){
		
				
$token_data = DB::table('password_resets')->where('token', $token)->first();
//print_r($token_data);die;
if($token_data==null){


return redirect('/admin/login')->with('fail','Link already used');

}else{

return view('auth.passwords.reset',['token'=>$token,'id'=>$id,]);

}
		
		
		
		
	}
	
public function reset_password(Request $request){

$id=1;
$this->validate($request,[

'email'=>'required|email',
'password'=>'required|confirmed',
'password_confirmation'=>'required',


]);		
$admin = Admin::findOrFail($id);
if($request['email']==$admin->email){
//get data from reset table and check if token exists or not


$admin->password=bcrypt($request['password']);
$admin->updated_at='2016-08-08 13:23:25';
$admin->update();
//delete from password reset table
DB::table('password_resets')->where('email', $admin->email)->delete();


return redirect('/admin/login')->with(['success','Password Change Successfully Done']);

}else{


return redirect('/admin/login')->with(['fail','Something Wrong Happend']);
}





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
