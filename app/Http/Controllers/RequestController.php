<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as RequestModel;
use Carbon\Carbon;


class RequestController extends Controller
{
     public function index()
     {
         //  $posts = RequestModel::all()->sortByDesc('created_at');
         $today = Carbon::today('Asia/Tokyo');
         // 今日以降のデータを取得
         $posts = RequestModel::whereDate('display_date_to', '<=', $today)->get()->sortByDesc('created_at');
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