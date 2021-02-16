<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
// use App\ChatRoom;
// use App\ChatRoomUser;
// use App\ChatMessage;

class ChatController extends Controller
{
    public static function chat(Request $request) {
        $chat = new ChatMessage();
        $chat->chat_room_id = $request->chat_room_id;
        $chat->user_id = $request->user_id;
        $chat->message = $request->request;
        
        $chat->save();
        
        event(new ChatPusher($chat));
    }
}
