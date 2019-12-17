<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RepliedToThread extends Notification
{
    use Queueable;

    protected $email;
    protected $title;
    protected $checkin;
    protected $checkout;

    public function __construct($email, $title, $checkin, $checkout)
    {
        $this->title = $title;
        $this->email = $email;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Bạn nhận được yêu cầu thuê nhà",
            'title' => $this->title,
            'checkin' => $this->checkin,
            'checkout' => $this->checkout,
            'receiver' => $this->email,
            'sender' => $notifiable->email,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
