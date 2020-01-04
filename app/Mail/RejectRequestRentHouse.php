<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectRequestRentHouse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $mail;
    protected $reasons;

    public function __construct($mail, $reasons)
    {
        $this->mail = $mail;
        $this->reasons = $reasons;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reasons = $this->reasons;
        return $this
            ->from($this->mail)
            ->view('content_email_reject', compact('reasons'));
    }
}
