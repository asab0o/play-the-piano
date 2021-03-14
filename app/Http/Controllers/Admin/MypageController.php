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
        
        // id = 1
        $user = User::find(Auth::id());
        // プロフィール取得
        $player = Player::where('user_id', Auth::id())->first();
        // 依頼記事取得
        $request_model = RequestModel::where('user_id', Auth::id())->get();
        // ログインユーザーがもっているチャットルームのid取得
        $chat_room_id = ChatUser::where('user_id', Auth::id())->pluck('chat_id');
        
        // General error: 2031の解消のため条件分岐追記
        if ($chat_room_id->isEmpty()) {
            $chat_partner = null;
            $chat_msg_date = null;
        } else {
            // 現在進行形のチャットルームのid取得
            // dd($chat_room_id);
            // 第二引数が配列なのでwhereInとする
            $chat_user_id = ChatUser::whereIn('chat_id', $chat_room_id)
                // 自分のidは除く
                ->where('user_id', '!=', Auth::id())
                ->pluck('user_id');
            
            $chat_user = User::find($chat_user_id);
            
            $chat_msg_date = ChatMessage::where('chat_id', $chat_room_id)->latest('updated_at')->value('updated_at');
            
        }
        
        return view('admin.mypage.index', [
            'player' => $player,
            'requests' => $request_model,
            'genders' => $genders,
            'prefectures' => $prefectures,
            'genres' => $genres,
            'chats' => $chat_user,
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
