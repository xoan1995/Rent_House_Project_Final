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
    protected $house_id;
    protected $order_id;

    public function __construct($email, $title, $checkin, $checkout, $house_id, $order_id)
    {
        $this->title = $title;
        $this->email = $email;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->house_id = $house_id;
        $this->order_id = $order_id;
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
            'house_id' => $this->house_id,
            'order_id' => $this->order_id,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
