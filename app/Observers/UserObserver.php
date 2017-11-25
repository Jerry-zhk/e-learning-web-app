<?php

namespace App\Observers;

use App\User;
use App\Models\Event;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Listen to the User deleted event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Listen to the User logout event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function logout(User $user)
    {
        
    }
}