<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;
use App\Request as RequestModel;
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
        
        $user = User::find($request->id);
        $player = Player::where('user_id', $request->id)->first();
        $request_model = RequestModel::where('user_id', $request->id)->get();
        
        // dd($player); 
        // dd($request_model); 
        return view('admin.mypage.index', [
            'player' => $player,
            'requests' => $request_model,
            'genders' => $genders,
            'prefectures' => $prefectures,
            'genres' => $genres,
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
