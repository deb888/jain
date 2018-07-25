<?php

namespace App\Listeners;

use App\Events\frontsendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\frontuser;
class frontsendmailfired
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
     * @param  frontsendMail  $event
     * @return void
     */
    public function handle(frontsendMail $event)
    {	echo $event->userId;die;
        $user=frontuser::find($event->userId)->toArray();
		$email_content['email_subject']=>'Registration Successfull';
		 Mail::send('emails.frontmailt', ['mailContent1'=>$user['email'],'mailContent1'=>$user['email']], function($message) use ($user,$email_content) {
            $message->from('teamcrescentek@gmail.com','Verufie');
            $message->to($user['email']);
           $message->cc('wwwdeb888@gmail.com', $name = null);
            $message->subject($email_content['email_subject']);
        });
    }
}
