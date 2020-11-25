<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function send(Session $session, Request $request) 
    {
        $message = $session->message()->create(['content' => $request->content]);
        
        $message->createForSend($session->id);

        $message->createForRecieve($session->id, $request->to_user);

        return response($message, 200);
    }
}
