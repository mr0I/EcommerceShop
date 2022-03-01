<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.test',['user'=>$this->user]);
        return (App::getLocale() === 'en')
            ? $this->view('emails.verifyUser',['user'=>$this->user])->subject('Verify Account')
            : $this->view('emails.verifyUser',['user'=>$this->user])->subject('تایید حساب کاربری');
    }
}
