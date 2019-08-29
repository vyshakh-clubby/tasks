<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $template = "";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template)
    {
        $this->template = $template;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // return $this->view('view.name');
        //dd("ds");


       return $this->view('emails.test', ['template'=>$this->template]);



       // return
    }
}
