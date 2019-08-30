<?php

namespace App\Jobs;

use App\Emails;
use App\Mail\WelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use SendGrid\Mail\Mail;


class SendWelcomeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $template    =   "";


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $emailConfig    =   Config::get('mail.from');
        $emailFrom      =   $emailConfig["address"];
        $emailFromName  =   $emailConfig["name"];
        $apiKey         =   Config::get("mail.sendgrid_api_key");
        $sendgrid       =   new \SendGrid($apiKey);
        $data           =   Emails::where('current_status',1)->first();





        $email = new Mail();
        $email->setFrom($emailFrom, $emailFromName);
        $email->setSubject("Reminder Mail");
        $email->addTo($data['email'],"");
        $email->addContent("text/plain","Test mail");
        $email->addContent("text/html",$this->template);





        try {

            $response = $sendgrid->send($email);
            Emails::where('email',$data['email'])->update(['current_status'=>0]);
            //print $response->statusCode() . "\n";
            //print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {

            echo 'Caught exception: '. $e->getMessage() ."\n";
        }


        /*$emailSend  =   new WelcomeMail($this->template);
        Mail::to($data['email'])->send($emailSend);
        Emails::where('email',$data['email'])->update(['current_status'=>0]);*/
        /*$data   =   ['template'=>"Hi"];

        Mail::send ( 'emails.test', $data, function ($message) {

            $message->from ( 'vyshakh@clubby.in', 'Just Laravel' );

            $message->to ( 'vyshakh@clubby.in' )->subject ( 'Just Laravel demo email using SendGrid' );
        } );*/



    }
}
