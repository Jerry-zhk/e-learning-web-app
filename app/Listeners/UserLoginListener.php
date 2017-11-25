<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoginListener
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
    public function handle(Login $event)
    {
        $user = $event->user;
        $ev = new \App\Models\Event();
        $ev->event_type = "LOGIN";
        $ev->user_id = $user->id;
        $ev->description = "$user->username has logged in!";
        $ev->save();
    }
}
