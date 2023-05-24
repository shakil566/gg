<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

// class SendMail extends Notification implements ShouldQueue //for queue
class SendMail extends Notification
{

    use Queueable;

    public $subject = '';
    public $body = '';
    public $userName = '';
    public function __construct($subject, $body, $userName)
    {

        $this->subject = $subject;
        $this->body = $body;
        $this->userName = $userName;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $subject = $this->subject;
        $body = $this->body;
        $userName = $this->userName;

        return (new MailMessage)
            ->subject($subject)
            ->view('admin.mailSend.mailTemplate', compact('body', 'subject', 'userName'));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
