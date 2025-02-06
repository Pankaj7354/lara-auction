<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\{PusherCall, SecondPusherCall};

class EventController extends Controller
{

    public function testEvents()
    {
        broadcast(new Pushercall('This is a normal event!'));
        broadcast(new SecondPushercall(['secret' => 'Cheat code activated!']));

        return response()->json(['status' => 'Events sent!']);
    }
}
