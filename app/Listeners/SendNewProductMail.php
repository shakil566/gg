<?php

namespace App\Listeners;

use App\Events\NewProduct;
use App\Mail\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewProductMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewProduct  $event
     * @return void
     */
    public function handle(NewProduct $event)
    {
        $userEmail = $event->userEmail;
        $subject = $event->subject;
        $body = $event->body;
        $userName = $event->userName;
        Mail::to($userEmail)->send(new SendMail($subject, $body, $userName));
    }
}
