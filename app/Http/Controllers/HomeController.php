<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Request as RequestModel;
use App\User;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 投稿が新しい順に6つデータを取得したい
        $players = Player::latest()->limit(6)->get();
        $request_model = RequestModel::latest()->limit(3)->get();
        return view('home', [
            'players' => $players,
            'requests' => $request_model,
            ]);
    }
}
