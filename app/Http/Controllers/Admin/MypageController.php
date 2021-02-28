<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;
use App\Request as RequestModel;
use App\ChatUser;
use App\ChatMessage;
use App\User;
use Auth;
use Carbon\Carbon;
use Storage;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->genders = $this->getGenders();
        $this->prefectures = $this->getPrefectures();
        $this->genres = config('app.genres');
    }
    
    public function index(Request $request)
    {
        $genders = $this->genders;
        $prefectures = $this->prefectures;
        $genres = $this->genres;
        
        $user = User::find(Auth::id());
        $player = Player::where('user_id', Auth::id())->first();
        $request_model = RequestModel::where('user_id', Auth::id())->get();
        // ログインユーザーがもっているチャットルームのid取得
        $chat_room_id = ChatUser::where('user_id', Auth::id())->pluck('chat_id');
        // General error: 2031の解消のため条件分岐追記
        if ($chat_room_id->isEmpty()) {
            $chat_partner = null;
            $chat_msg_date = null;
        } else {
            // 現在進行形のチャットルームのid取得
            $chat_user = ChatUser::where('chat_id', $chat_room_id)->pluck('user_id');
            
            foreach($chat_user as $chat_user_id) {
                if($chat_user_id != $request->id) {
                    $chat_partner[] = User::find($chat_user_id);
                }
            }
            
            $chat_msg_date = ChatMessage::where('chat_id', $chat_room_id)->latest('updated_at')->value('updated_at');
        }

        return view('admin.mypage.index', [
            'player' => $player,
            'requests' => $request_model,
            'genders' => $genders,
            'prefectures' => $prefectures,
            'genres' => $genres,
            'chats' => $chat_partner,
            'chat_msg_date' => $chat_msg_date,
        ]);
    }
    
    private function getPrefectures()
    {
        $result = \DB::table('prefectures')->get()->pluck("name");
        // dd($result);
        return $result;
    }
    
    private function getGenders()
    {
        // 201227 訂正
        $result = \DB::table('genders')->get()->all();
        // dd($result);
        return $result;
    }
}
