<?php

namespace App\Mail\Auth\Password;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $code;

    /**
     * Create a new message instance.
     * @param $name
     * @param $code
     * @internal param $email
     */
    public function __construct($name,$code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $code = $this->code;
        return $this->from('noreplay@ly.ly')
            ->view('email.Auth.Password.email',compact('name','code'));
    }
}
