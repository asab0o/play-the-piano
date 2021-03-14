<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

use App\Player;

use App\Chat;
use App\ChatUser;
use App\ChatMessage;

use App\Events\ChatPusher;

class ChatController extends Controller
{
    
    public function show(Request $request) {
    
        // チャットしたい人のuser_idを取得
        $chat_partner_id = $request->user_id;
        // ログインユーザーのチャットルームを取得
        $current_chat_rooms = ChatUser::where('user_id', Auth::id())->pluck('chat_id');
        // 相手とのチャットルーム探す, なければ作成
        $chat_room_id = ChatUser::whereIn('chat_id', $current_chat_rooms)
            ->where('user_id', $chat_partner_id)
            ->pluck('chat_id');
        
        // チャットを過去にやったことがない場合新しくつくる
        if ($chat_room_id->isEmpty()) {
            Chat::create();
            $latest_chat_room = Chat::orderBy('created_at', 'desc')->first();
            $chat_room_id = $latest_chat_room->id;
            
            ChatUser::create ([
                'chat_id' => $chat_room_id,
                'user_id' => Auth::id(),
                ]);
            ChatUser::create ([
                'chat_id' => $chat_room_id,
                'user_id' => $chat_partner_id,
                ]);
        }
            // チャットルーム取得時はオブジェクト型(配列)なので数値に変換
        if(is_object($chat_room_id)) {
            $chat_room_id = $chat_room_id->first();
        }
        
        // 非同期通信用の変数取得
        $chat_room_user = User::findOrFail($chat_partner_id);
        // チャット用の名前を出したい
        $chat_room_user_name = $chat_room_user->name;
        
        $chat_msg= ChatMessage::where('chat_id', $chat_room_id)
            ->orderBy('created_at')
            ->get();
        
        return view('admin.chat.show', compact('chat_room_id', 'chat_room_user', 'chat_room_user_name', 'chat_msg'));
    }
    
    public function chat(Request $request) {
        $message = new ChatMessage();
        $message->chat_id = $request->chat_id;
        $message->user_id = $request->user_id;
        $message->message = $request->message;
        
        $message->save();
        
        event(new ChatPusher($message));
    }
}
