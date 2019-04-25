<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChiefMail extends Mailable
{
    use Queueable, SerializesModels;
    public $chief_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($chief_name)
    {
        //
        $this->chief_name = $chief_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ChiefMailing');
    }
}
