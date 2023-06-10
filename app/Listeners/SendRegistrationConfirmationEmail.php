<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Mail\RegistrationConfirmationEmail as ConfirmationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegistrationConfirmationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Mail::to($event->customer->email)->send(new ConfirmationEmail($event->customer));
    }
}
