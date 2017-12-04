<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Observers\UserObserver;

use App\Models\Series;
use App\Observers\SeriesObserver;

use App\Models\Tutorial;
use App\Observers\TutorialObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Series::observe(SeriesObserver::class);
        Tutorial::observe(TutorialObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
