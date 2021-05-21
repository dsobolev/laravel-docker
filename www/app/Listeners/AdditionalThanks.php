<?php

namespace App\Listeners;

use App\Events\PaymentDone;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdditionalThanks
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
     * @param  PaymentDone  $event
     * @return void
     */
    public function handle(PaymentDone $event)
    {
        dd($event);
    }
}
