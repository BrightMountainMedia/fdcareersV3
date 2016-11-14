<?php

namespace App\Listeners;

use App\Notifications\WelcomeEmail;
use Laravel\Spark\Events\Auth\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail implements ShouldQueue
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
