<?php

namespace App\Listeners;

use Laravel\Spark\Events\Auth\UserRegistered;
use App\Notifications\WelcomeEmail;

class SendWelcomeEmail
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
     * @param  \Laravel\Spark\Events\Auth\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $event->user->notify(new WelcomeEmail($event->user));
    }
}
