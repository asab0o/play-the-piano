<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as RequestModel;


class RequestController extends Controller
{
     public function index()
     {
         $posts = RequestModel::all()->sortByDesc('created_at');
        //  dd($posts);
         return view('request.index', ['posts' => $posts]);
         
     }
    
    public function showArticle(Request $request)
    {
        
        $request_model = RequestModel::find($request->id);
        // return view('request.article', ['request' => $posts]);
        return view('request.article', ['request' => $request_model]);
    }
    
}