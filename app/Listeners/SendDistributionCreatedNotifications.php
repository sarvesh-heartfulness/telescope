<?php

namespace App\Listeners;

use App\Events\DistributionCreated;
use App\Models\User;
use App\Notifications\NewDistribution;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendDistributionCreatedNotifications implements ShouldQueue
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
    public function handle(DistributionCreated $event): void
    {
        foreach (User::whereNot('id', $event->distribution->user_id)->cursor as $user) {
            $user->notify(new NewDistribution($event->distribution))
        }
    }
}
