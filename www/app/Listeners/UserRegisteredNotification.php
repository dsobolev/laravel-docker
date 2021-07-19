<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRegistered;
use App\Repositories\UserRepository;

class UserRegisteredNotification
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    /**
     * Handle the event.
     *
     * @param  Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Notification::send(
            $this->userRepo->getAdminUsers(),
            new UserRegistered($event->user->id)
        );
    }
}
