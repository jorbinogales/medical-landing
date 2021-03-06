<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class EmailSend extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $document;
    public $host;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    public function __construct($document, $msg, $host)
    {
        $this->msg = $msg;
        $this->document = $document;
        $this->host = $host;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo Catálogo disponible')
                     ->view('email.EmailSend');
    }
}
