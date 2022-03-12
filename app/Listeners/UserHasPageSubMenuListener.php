<?php

namespace App\Listeners;

use App\Events\NotifyUserHasPageSubMenu;
use App\Notifications\UserHasPageSubMenuNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UserHasPageSubMenuListener implements ShouldQueue
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
     * @param  \App\Events\UserHasPageSubMenuEvent  $event
     * @return void
     */
    public function handle(NotifyUserHasPageSubMenu $event)
    {
        Notification::send(null, new UserHasPageSubMenuNotification($event->userHasPageSubMenu, $event->job));
    }
}
