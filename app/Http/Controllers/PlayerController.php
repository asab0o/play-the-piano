<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $posts = Player::all()->sortByDesc('created_at');
        return view('player.index', ['posts' => $posts]);
    }
    
    public function showProfile($id)
    {
        
        return view('player.introduction', ['posts' => $posts]);
    }
    
    
}
