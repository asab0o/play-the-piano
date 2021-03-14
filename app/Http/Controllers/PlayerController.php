<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    
    public function __construct()
    {
        $this->prefectures = $this->getPrefectures();
    }
    
    public function index()
    {
        // $posts = Player::select('id', 'firstname_1', 'introduction', 'created_at')->get()->sortByDesc('created_at');
        $posts = Player::all()->sortByDesc('created_at');
        return view('player.index', compact('posts'));
    }
    
    public function showProfile(Request $request)
    {
        $prefectures = $this->prefectures;
        $player = Player::find($request->id);
        return view('player.profile', compact('player', 'prefectures'));
    }
    
    
    private function getPrefectures()
    {
        $result = \DB::table('prefectures')->get()->pluck("name");
        return $result;
    }
    
}
