<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Datos de Ingreso SAGIS";
    public $person;

    public $email;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($person, $password, $email)
    {
        $this->email= $email;
        $this->person = $person;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

     public function build()
    {
        return $this->view('emails.message-received');
    }
    
}
