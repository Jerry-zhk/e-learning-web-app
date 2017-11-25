<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLogoutListener
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $user = $event->user;
        $ev = new \App\Models\Event();
        $ev->event_type = "LOGOUT";
        $ev->user_id = $user->id;
        $ev->description = "$user->username has logged out!";
        $ev->save();
    }
}
