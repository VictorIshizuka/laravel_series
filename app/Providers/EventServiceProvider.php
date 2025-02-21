<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        \App\Events\SeriesCreated::class => [
            \App\Listeners\EmailUserAboutSeriesCreated::class,
             \App\Listeners\LogSeriesCreated::class
        ],
        \App\Events\DeleteSeries::class => [
            \App\Listeners\DeleteImageListener::class
        ]
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
