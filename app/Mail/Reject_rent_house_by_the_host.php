<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reject_rent_house_by_the_host extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email;
    protected $reasons;

    public function __construct($email, $reasons)
    {
        $this->email = $email;
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
            ->from($this->email)
            ->view('content_email_reject_by_host',compact('reasons'));
    }
}
