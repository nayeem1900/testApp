<?php

namespace App\Mail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $userInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($getUserInfo)
    {
        $this->userInfo = $getUserInfo;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('majadul.dev@gmail.com', 'forget Passoword')
                ->view('emails.forget_password');
    }
}
