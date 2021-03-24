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
        $chat_list = [];
        if ($chat_room_id->isEmpty()) {
            $chat_list = null;
        } else {
            $i = 0;
            foreach ($chat_room_id as $chat_id) {
                // 現在進行形のチャットルームのid取得
                $chat_user_id = ChatUser::where('chat_id', $chat_id)
                    ->where('user_id', '!=', Auth::id())
                    ->value('user_id');
                // 相手の名前取得
                $chat_user = User::find($chat_user_id);
                $chat_user_name = $chat_user->name;
                // 最後にチャットした日付を取得
                // 三項演算子かif文でmessageないときnull入れる必要がある
                $latest_chat= ChatMessage::where('chat_id', $chat_id)
                    ->latest()
                    ->value('created_at');
                $latest_chat_date = empty($latest_chat) ? null : date('Y/m/d', strtotime($latest_chat));
                // $latest_chat_date = date('Y/m/d', strtotime($latest_chat));
                // 配列にする
                $chat_list[$i] = [$chat_user_id, $chat_user_name, $latest_chat_date];
                $i ++;
            }
        }
        
        return view('admin.mypage.index', [
            'player' => $player,
            'requests' => $request_model,
            'genders' => $genders,
            'prefectures' => $prefectures,
            'genres' => $genres,
            'chat_list' => $chat_list,
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
