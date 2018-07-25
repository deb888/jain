<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use App\frontuser;
use App\workcategory;
use App\Worksubcat;
use Mail;
use Event;
use DB;
use URL;
use App\Events\frontsendMail;
use App\Events\SendMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\states;
use App\cities;
use App\contactinfo;
class Frontuserauth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $contact=contactinfo::where('status','1')->get();
         return view('frontend.authfront.login',['contactdata'=>$contact]);
    }

	  public function postlogin(Request $request)
    {
        $this->validate($request,[

				'email'=>'required',
				'password'=>'required',

		]);

      if(!Auth::guard('frontuser')->attempt(['email'=>$request['email'],'password'=>$request['password']])){
      Session::set('msg', 'Incorrect Email Or password.');
      if($request['p_id']!=''){
      return redirect('/package')->with('fail','Incorrect Email Or Password');

      }else{
      return redirect('/login')->with('fail','Incorrect Email Or Password');

      }


		}else{
		$user = Auth::guard('frontuser')->user();
		//Session::set('msg', 'SuccessFully Logged In');
		Session::put('username', $user->email);
		Session::put('createdate', $user->created_at);
    if($request['p_id']!=''){
        return redirect('/checkout/'.$request['p_id']);

    }else{
      return redirect()->route('home.index')->with(['success','Login Success']);

    }

		}

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function register()
    {
         $contact=contactinfo::where('status','1')->get();
         return view('frontend.authfront.register',['contactdata'=>$contact]);
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
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required',
				'phone_no' => 'required',
				'address' => 'required',
				'password' => 'required',
        	'city' => 'required',
          'country' => 'required',

				]);
				$frontuser=new frontuser();
				$frontuser->first_name=$request['first_name'];
				$frontuser->last_name=$request['last_name'];
				$frontuser->email=$request['email'];
				$frontuser->phone_no=$request['phone_no'];
				$frontuser->address=$request['address'];
                                $frontuser->city=$request['city'];
                                $frontuser->state=$request['state'];
                                $frontuser->country=$request['country'];
				$frontuser->password=bcrypt($request['password']);
				$frontuser->save();
				Session::set('msg', 'Registration SuccessFully Done.');
				Mail::send('emails.frontmailt', ['mailContent1' => $request['email'],'mailContent2'=>$request['password'],], function ($m) use ($frontuser) {
				$m->from('hello@app.com', 'Your Application');

				$m->to($frontuser->email, $frontuser->name)->subject('Your Registration Reminder!');
				});

				//Session::put('createdate', $user->created_at);
          if($request['p_id']!=''){

            if(!Auth::guard('frontuser')->attempt(['email'=>$request['email'],'password'=>$request['password']])){

              return redirect('/login')->with('fail','Incorrect Email Or Password');

            }else{
            $user = Auth::guard('frontuser')->user();
            //Session::set('msg', 'SuccessFully Logged In');
            Session::put('username', $user->email);
            Session::put('createdate', $user->created_at);
          }
            return redirect('/checkout/'.$request['p_id']);

          }else{
            return redirect('/login');

          }


    }
public function send_reset_link(Request $request){

							//get the data
$id='1';
$this->validate($request,[

'email'=>'required|email',


]);

//echo $request['email'];die;

$email=$request['email'];

$admin = frontuser::where('email',$request['email'])->get();
$admin=$admin[0];
if($request['email']==$admin->email){

$insert_array=array(

'email'=>$admin->email,
'token'=>time().rand(10000,99999),


);
$id = DB::table('password_resets')->insertGetId(


['email'=>$admin->email,'token'=>$insert_array['token'],]
);

$message='Clik The Below LInk';
$verify_url="<a style='color:blue;font-weight:normal;' href='".URL::to('/')."/frontmailverification/".$insert_array['token']."/".$insert_array['email']."'>click here</a>";

//echo $send_body="<p>Click This Link ".$verify_url." </p>";die;

Event::fire(new SendMail($admin,$verify_url));
session::set('msg','Hey, You have a message to read');
return redirect('/login')->with(['success','Password Verification Mail send To your account Please Check Your Email',]);

}




	}


public function mailverification($token,$id){


$token_data = DB::table('password_resets')->where('token', $token)->first();
//print_r($token_data);die;
if($token_data==null){


return redirect('/login')->with('fail','Link already used');

}else{

  $contact=contactinfo::where('status','1')->get();

return view('frontend.authfront.passwords.reset',['token'=>$token,'id'=>$id,'contactdata'=>$contact]);

}




	}

public function profilepass(){
	$user=Auth::guard('frontuser')->user();
		//print_r($user->id);die;
		$data=frontuser::where('id',$user['id'])->get();
		$contact=contactinfo::where('status','1')->get();
	return view('frontend.propass',['dt'=>$data,'contactdata'=>$contact]);


}

public function reset_password(Request $request){

$id=1;
$this->validate($request,[

'email'=>'required|email',
'password'=>'required|confirmed',
'password_confirmation'=>'required',


]);
$admin = frontuser::where('email',$request['email'])->get();
$admin=$admin[0];
if($request['email']==$admin->email){
//get data from reset table and check if token exists or not


$admin->password=bcrypt($request['password']);
$admin->updated_at='2016-08-08 13:23:25';
$admin->update();
//delete from password reset table
DB::table('password_resets')->where('email', $admin->email)->delete();
session::set('msg','Hey, Your Password Changed Successfully');

return redirect('/login')->with(['success','Password Change Successfully Done']);

}else{


return redirect('/login')->with(['fail','Something Wrong Happend']);
}





}


 public function change(Request $request)
    {			$insert_arr=$request->all();
				if($insert_arr['oldpassword']!=''){

				$this->validate($request, [
				'oldpassword' => 'required',
				'password' => 'required',
				'conpassword' => 'required',


				]);

				$user=Auth::guard('frontuser')->user();
			 $oldpassword=bcrypt($insert_arr['oldpassword']);




				//$admin = Admin::where('passeword', $oldpassword)->findOrFail($id);
					$admin = frontuser::findOrFail($user->id);



				if (Hash::check($insert_arr['oldpassword'], $admin->password)) {




					$admin->password=bcrypt($insert_arr['conpassword']);
					$admin->update();

				}else{

					session::set('msg','Old Password Not  Match');
					return redirect()->route('frontuserauth.profile')->with(['fail'=>'Old Password Not  Match',]);

				}




				}else{

					//$id='1';
				//$admin = Admin::findOrFail($id);
				//$admin->name=$insert_arr['name'];
				//$admin->update();

				}
			session::set('msg','Password Changed Successfully');
			return redirect()->route('frontuserauth.profile')->with(['success'=>'Updated Successfully',]);

    }




   public function forgetpassword(){

           $contact=contactinfo::where('status','1')->get();
	   return view('frontend.authfront.passwords.email',['contactdata'=>$contact]);


   }

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
	public function profile(){
		//echo public_path();die;
		$user=Auth::guard('frontuser')->user();
		//print_r($user->id);die;
		$data=frontuser::where('id',$user['id'])->get();
		//print_r($data);die;
		 return view('frontend.profile',['dt'=>$data]);


	}
   public function getlogout(){

		Auth::guard('frontuser')->logout();
		//return redirect()->route('login')->with(['Success','SuccessFully Logout']);
		 return Redirect::to('/login');

	}
	public function mail_check(Request $request){

		$frontuser=frontuser::where('email',$request['email'])->get();

		if ($frontuser->isEmpty()) {
			echo 'true';
		}else{
			echo 'false';
		}
	}
	public function update_profile(Request $request){
		$userdata=Auth::guard('frontuser')->user();
		$frontuser=frontuser::where('id',$userdata->id)->get();
		if(!$frontuser->isEmpty()){

			$user=frontuser::findOrFail($userdata->id);
				$user->email=$request['email'];
				$user->first_name=$request['first_name'];
				$user->last_name=$request['last_name'];
				$user->phone_no=$request['phone_no'];
				$user->address=$request['address'];
				$user->update();
				session::set('msg','Profile Details Updated');
				return Redirect::to('/frontendprofile');
		}else{

			return Redirect::to('/frontendprofile');
		}


	}
	 public function upload() {

    if(Input::hasFile('file')) {
      //upload an image to the /img/tmp directory and return the filepath.
      $file = Input::file('file');
     $destinationPath = 'uploads/profilepics'; // upload path
			$extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing image
			//Input::file('image')->move($destinationPath, $fileName);
      $file = $file->move($destinationPath, $fileName);
	  //UPDATE DATABASE
	  $userdata=Auth::guard('frontuser')->user();
	  $user=frontuser::findOrFail($userdata->id);
	  $pt=URL::to('/uploads/').'/'.$user->profile_img;
	 //unlink($pt);
	  $user->profile_img=$fileName;
	  $user->update();
      $path = $destinationPath .'/'. $fileName;
      return response()->json(array('path'=> $path), 200);
    } else {
      return response()->json(false, 200);
    }
  }

  public function estimate($id){

	  $data=workcategory::findOrFail($id);

	   return view('frontend.estimatecalculate',['dt'=>$data,]);

  }
  public function get_ht(Request $request){

	 $data=Worksubcat::where('cat_id',$request['val1'])->get();
	  if($request['val']==1){

		   $res='<div id="dfg">';
		   if($data->isEmpty()){


		  $res.='<input type="hidden" name="sub_id[]" class="sub_id" value=" "/>';
		  $res.='<input type="hidden" name="spec_des[]" class="spec_des" value=" "/>';
		  echo $res;

		   }else{

			   foreach($data as $dt){

			  $res.='<div class="form-group">
                	<label>'.$dt->sub_desc.'</label>
                    <textarea rows="4" class="form-control" name="spec_des[]" id="spec_des" class="spec_des"></textarea>
					<input type="hidden" name="sub_id[]" class="sub_id" value="'.$dt->id.'"/>
                    </div>';

		   }
		   $res.='</div>';
					echo $res;
		   }

	  }else{
		  $res='';
		  $res.='<input type="hidden" name="sub_id[]" class="sub_id" value=""/>';
		  $res.='<input type="hidden" name="spec_des[]" class="spec_des" value=""/>';
		  echo $res;
	  }


  }
  public function get_states(Request $request){
      $states = states::where('country_id',$request['country_id'])->get();
		$res='';
        $res.='<select name="state" class="form-control" id="slt_sta">';
        foreach($states as $state){
			
            $res.='<option value='.$state->id.'>'.$state->name.' </option>';
        }
		$res.='</select>';
	 echo $res;		
                       
      
      
  }
  public function get_cities(Request $request){
      $cities = cities::where('state_id',$request['city_id'])->get();
		$res='';
        $res.='<select name="city" class="form-control" id="slt_city">';
        foreach($cities as $city){
			
            $res.='<option value='.$city->id.'>'.$city->name.' </option>';
        }
		$res.='</select>';
	 echo $res;		
                       
      
      
  }

}
