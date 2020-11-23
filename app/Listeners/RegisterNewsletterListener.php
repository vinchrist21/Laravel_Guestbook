<?php

namespace App\Listeners;

use App\Events\ActivationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterNewsletterListener
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
     * @param  ActivationEvent  $event
     * @return void
     */
    public function handle(ActivationEvent $event)
    {
        //
    }
}
