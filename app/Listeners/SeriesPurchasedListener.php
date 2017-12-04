<?php

namespace App\Listeners;

use App\Events\SeriesPurchased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SeriesPurchasedListener
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
     * @param  SeriesPurchased  $event
     * @return void
     */
    public function handle(SeriesPurchased $event)
    {
        $user = $event->user;
        $series = $event->series;
        $ev = new \App\Models\Event();
        $ev->event_type = "SERIES_PURCHASED";
        $ev->model_type = get_class($series);
        $ev->model_id = $series->id;
        $ev->user_id = $user->id;
        $ev->description = "$user->username has purchased series $series->title!";
        $ev->save();
    }
}
