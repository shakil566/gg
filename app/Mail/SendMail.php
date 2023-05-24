<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = '';
    public $body = '';
    public $userName = '';

    public function __construct($subject, $body, $userName)
    {

        $this->subject = $subject;
        $this->body = $body;
        $this->userName = $userName;
    }

    public function build() {

        // $subject = $this->subject;
        // $body = $this->body;
        // $userName = $this->userName;

        // return $this->subject($subject)->
        // view('admin.mailSend.mailTemplate', compact('body', 'subject', 'userName'));
    }

    public function envelope()
    {
        $subject = $this->subject;
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $subject = $this->subject;
        $body = $this->body;
        $userName = $this->userName;

        return new Content(
            view: 'admin.mailSend.mailTemplate',
            with: [
                'subject' => $this->subject,
                'body' => $this->body,
                'userName' => $this->userName,
            ],
        );

    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
