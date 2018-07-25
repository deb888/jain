<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Admin;
use App\emailmodel;
use Mail;
class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
         $user = Admin::find(1)->toArray();
		 $email_content=emailmodel::find(2)->toArray();
		 //print_r($email_content);die;
		 $email=$user['email'];
		 $linkx=$event->link_x;
        Mail::send('emails.mailEvent', ['mailContent'=>str_replace("%link%",$linkx,$email_content['email_body']),'link'=>$linkx,], function($message) use ($user,$email_content) {
            $message->from('teamcrescentek@gmail.com','Verufie');
            $message->to($user['email']);
           $message->cc('wwwdeb888@gmail.com', $name = null);
            $message->subject($email_content['email_subject']);
        });
    }
}
