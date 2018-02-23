<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class recoverMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    private $token;
    /**
     * @var
     */
    private $user;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $token
     */
    public function __construct($user,$token)
    {
        //
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $token = $this->token;
        return $this->from('noreplay@ly.ly')
            ->view('email.recover.email',compact('user','token'));
    }
}
