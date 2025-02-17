<?php

namespace App\Listeners;


use App\Events\SeriesCreated;
use App\Mail\SeriesCreated as SeriesCreatedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;

class EmailUserAboutSeriesCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SeriesCreated $event): void
    {
        Mail::to($event->email)->queue(
            new SeriesCreatedMail(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQty,
                $event->seriesEpisodesPerSeason
            )
        );
    }
}
