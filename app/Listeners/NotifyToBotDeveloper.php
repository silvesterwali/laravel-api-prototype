<?php

namespace App\Listeners;

use App\Event\NotifyToBotDeveloper as NotifyToBotDeveloperEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyToGroupApi;

/**
 * Lister responsible to send notification to `telegram`
 *
 */
class NotifyToBotDeveloper implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\NotifyToBotDeveloper  $event
     * @return void
     */
    public function handle(NotifyToBotDeveloperEvent $event)
    {
        Notification::send(null, new NotifyToGroupApi($event->user, $event->permission, $event->job));
    }
}
