<?php

namespace App\Listeners;

use App\Models\Activity;
use App\Events\UserLogout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoggedout
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
     * @param  UserLogout  $event
     * @return void
     */
    public function handle(UserLogout $event)
    {
        // dd('User Register');
        $user = new Activity;
        $user->user_id = auth()->user()->id;
        $user->activity = 'Logged Out';
        $user->save();
    }
}
