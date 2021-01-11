<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as RequestModel;


class RequestController extends Controller
{
     public function index() {
        // $posts = Request::all()->sortByDesc('created_at');
        // return view('request.index', ['posts' => $posts]);
        return view('request.index');
    }
    
    public function showArticle(Request $request)
    {
        
        $request_model = RequestModel::find($request->id);
        // return view('request.article', ['request' => $posts]);
        return view('request.article', ['request' => $request_model]);
    }
    
}