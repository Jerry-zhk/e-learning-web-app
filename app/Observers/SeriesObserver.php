<?php

namespace App\Observers;

use App\Models\Series;
use App\Models\Event;
use Auth;

use Illuminate\Support\Facades\Log;

class SeriesObserver
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
        Log::debug($this->user->username);
    }

    /**
     * Listen to the Series created event.
     *
     * @param  \App\Models\Series  $series
     * @return void
     */
    public function created(Series $series)
    {
        $event = new Event();
        $event->event_type = "SERIES_CREATE";
        $event->model_type = Series::class;
        $event->model_id = $series->id;
        $event->user_id = $this->user->id;
        $event->description = "Series, $series->title, was created by " . $this->user->username . '!';
        $event->save();
    }

     /**
     * Listen to the Series updated event.
     *
     * @param  \App\Models\Series  $series
     * @return void
     */
    public function updated(Series $series)
    {
        $isUpdated = false;
        foreach($series->getDirty() as $fieldName => $newValue)
            if (!in_array($fieldName, ['created_at', 'updated_at', 'deleted_at'])) 
                $isUpdated = true;
            
        if(!$isUpdated) return;

        $event = new Event();
        $event->event_type = "SERIES_UPDATE";
        $event->model_type = Series::class;
        $event->model_id = $series->id;
        $event->user_id = $this->user->id;
        $event->description = "Series, $series->title, was updated by " . $this->user->username . '!';
        $event->save();
    }

    /**
     * Listen to the Series deleted event.
     *
     * @param  \App\Models\Series  $series
     * @return void
     */
    public function deleted(Series $series)
    {
        $event = new Event();
        $event->event_type = "SERIES_DELETE";
        $event->model_type = Series::class;
        $event->model_id = $series->id;
        $event->user_id = $this->user->id;
        $event->description = "Series, $series->title, was deleted by " . $this->user->username . '!';
        $event->save();
    }

    /**
     * Listen to the Series restored event.
     *
     * @param  \App\Models\Series  $series
     * @return void
     */
    public function restored(Series $series)
    {
        $event = new Event();
        $event->event_type = "SERIES_RESTORE";
        $event->model_type = Series::class;
        $event->model_id = $series->id;
        $event->user_id = $this->user->id;
        $event->description = "Series, $series->title, was restored by " . $this->user->username . '!';
        $event->save();
    }




    
}