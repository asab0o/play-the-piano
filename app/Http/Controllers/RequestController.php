<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class RequestController extends Controller
{
     public function index(Request $request) {
        $posts = Request::all()->sortByDesc('created_at');
        return view('request.index', ['posts' => $posts]);
    }
    
    public function showArticle($id)
    {
        
        return view('request.article', ['posts' => $posts]);
    }
    
}