<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationController extends Controller
{
    public function get() {
        $notification = Auth::user()->unreadNotifications;
        return $notification;
        //return Notification::all();
    }

    public function read(Request $request) {
        Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
        return 'success';
    }
}
