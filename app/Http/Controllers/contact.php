<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
use Session;
use Redirect;
use App\contactinfo;

class contact extends Controller
{
  public function index()
  {
  $contact=contactinfo::where('status','1')->get();
   return view('frontend.contact_front',['contactdata'=>$contact]);
  }
  public function contact_post(Request $request){

    $this->validate($request,[

    'email'=>'required',
    'msg'=>'required',

]);
Session::set('msg', 'Contact Send  SuccessFully.');
Mail::send('emails.contactmail', ['mailContent1' => $request['email'],'mailContent2'=>$request['msg'],], function ($m) use ($request) {
$m->from('admin@app.com', 'Your Application');

$m->to('admin@chuck-media.com', 'New Contact info')->subject('New Contact Info!');
});

//Session::put('createdate', $user->created_at);
return redirect('/contact');


  }
}
