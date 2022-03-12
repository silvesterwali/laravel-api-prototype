<?php

namespace App\Events;

use App\Enum\GiveAndRevokePermission;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Spatie\Permission\Models\Permission;

/**
 * NotifyToBotDeveloper
 *
 *  Send notification to developer bot telegram
 *
 */
class NotifyToBotDeveloper
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public User $user, public Permission $permission, public GiveAndRevokePermission $job)
    {
        //
    }
}
