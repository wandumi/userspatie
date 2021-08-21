<?php

namespace App\Listeners;

use App\Models\Activity;
use App\Events\UserLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoggedin
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
     * @param  UserLogin  $event
     * @return void
     */
    public function handle(UserLogin $event)
    {
        // dd('User Register');
        $user = new Activity;
        $user->user_id = auth()->user()->id;
        $user->activity = 'Logged In';
        $user->save();
    }
}
