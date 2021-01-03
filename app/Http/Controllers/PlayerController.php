<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    public function index()
    {
        // $posts = Player::select('id', 'firstname_1', 'introduction', 'created_at')->get()->sortByDesc('created_at');
        $posts = Player::all()->sortByDesc('created_at');
        // dd($posts);
        return view('player.index', ['posts' => $posts]);
    }
    
    public function showProfile(Request $request)
    {
        // データ受け渡しの変数定義が必要
        // 編集したらidが上書きされるようにしないと1人のuserが複数できてしまう
        $posts = Player::find($request->id);
        // dd($posts);
        return view('player.show', ['posts' => $posts]);
    }
    
    
}
