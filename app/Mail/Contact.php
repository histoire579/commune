<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $noms = "";
    public $emails = "";
    public $objets = "";
    public $messages = "";
    public $phones = "";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom,$email,$phone,$objet,$message)
    {
        $this->noms=$nom;
        $this->emails=$email;
        $this->objets=$objet;
        $this->messages=$message;
        $this->phones=$phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->emails)
                    ->subject($this->objets)
                    ->view('front.sendContact');
    }
}
