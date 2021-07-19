<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show() {

        // $notifications = auth()->user()->notifications;
        
        $notifications = auth()->user()->unreadNotifications;
        // $notifications->markAsRead();
    
        return view('payment.notify', [
            //'notifications' => tap($notifications)->markAsRead()
            'notifications' => $notifications
        ]);
    }
}
