<?php

namespace App\Listeners;

use App\Events\DeleteSeries;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Storage;

class DeleteImageListener implements ShouldQueue
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
    public function handle(DeleteSeries $event): void
    {

        if ($event->cover && $event->cover !== 'no-image.jpeg' && Storage::disk('public')->exists($event->cover)) {
            Storage::disk('public')->delete($event->cover);
        }
    }
}
