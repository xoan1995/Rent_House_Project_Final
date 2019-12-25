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
    protected $houseReject;

    public function __construct($mail, $houseReject)
    {
        $this->mail = $mail;
        $this->houseReject = $houseReject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $house = $this->houseReject;
        return $this
            ->from($this->mail)
            ->view('content_email_reject', compact('house'));
    }
}
