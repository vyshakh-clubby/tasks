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

        $emailFrom  =   getenv('MAIL_FROM');
        $apiKey     =   getenv('SENDGRID_API_KEY');
        $sendgrid   =    new \SendGrid($apiKey);
        $data       =   Emails::where('current_status',1)->first();

        echo "From:".$apiKey;
        dd();





        /*$email = new Mail();
        $email->setFrom('vyshakh@clubby.in', "Vyshakh");
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
        }*/



    }
}
