<?php

namespace App\Listeners;

use App\Jobs\SendChangePasswordChangeConfirmationJob;


class PasswordChangedEventListener
{
   

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        dispatch( new SendChangePasswordChangeConfirmationJob( $event->user ) );
    }
}
