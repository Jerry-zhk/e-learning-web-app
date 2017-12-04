<?php

namespace App\Observers;

use App\Models\Tutorial;
use App\Models\Event;
use Auth;

class TutorialObserver
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Listen to the Tutorial created event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function created(Tutorial $tutorial)
    {
        $event = new Event();
        $event->event_type = "TUTORIAL_CREATE";
        $event->model_type = Tutorial::class;
        $event->model_id = $tutorial->id;
        $event->user_id = $this->user->id;
        $event->description = "Tutorial, $tutorial->title, was created by " . $this->user->username . '!';
        $event->save();
    }

     /**
     * Listen to the Tutorial updated event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function updated(Tutorial $tutorial)
    {
        $isUpdated = false;
        foreach($tutorial->getDirty() as $fieldName => $newValue)
            if (!in_array($fieldName, ['created_at', 'updated_at', 'deleted_at'])) 
                $isUpdated = true;
            
        if(!$isUpdated) return;
        
        $event = new Event();
        $event->event_type = "TUTORIAL_UPDATE";
        $event->model_type = Tutorial::class;
        $event->model_id = $tutorial->id;
        $event->user_id = $this->user->id;
        $event->description = "Tutorial, $tutorial->title, was updated by " . $this->user->username . '!';
        $event->save();
    }

    /**
     * Listen to the Tutorial deleted event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function deleted(Tutorial $tutorial)
    {
        $event = new Event();
        $event->event_type = "TUTORIAL_DELETE";
        $event->model_type = Tutorial::class;
        $event->model_id = $tutorial->id;
        $event->user_id = $this->user->id;
        $event->description = "Tutorial, $tutorial->title, was deleted by " . $this->user->username . '!';
        $event->save();
    }

    /**
     * Listen to the Tutorial restored event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function restored(Tutorial $tutorial)
    {
        $event = new Event();
        $event->event_type = "TUTORIAL_RESTORE";
        $event->model_type = Tutorial::class;
        $event->model_id = $tutorial->id;
        $event->user_id = $this->user->id;
        $event->description = "Tutorial, $tutorial->title, was restored by " . $this->user->username . '!';
        $event->save();
    }




    
}