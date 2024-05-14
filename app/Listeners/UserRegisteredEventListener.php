<?php

namespace App\Listeners;

use App\Jobs\SendWelcomeEmailJob;


class UserRegisteredEventListener
{
   

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        dispatch( new SendWelcomeEmailJob( $event->user ) );
    }
}
