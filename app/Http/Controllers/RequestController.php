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
         $today = Carbon::now()->format('Y-m-d H:i');
         // 掲示期間の末日が今日以降
         $posts = RequestModel::whereDate('display_date_to', '>=', $today)->get()->sortByDesc('created_at');
         return view('request.index', ['posts' => $posts]);
         
     }
    
    public function showArticle(Request $request)
    {
        
        $request_model = RequestModel::find($request->id);
        // return view('request.article', ['request' => $posts]);
        return view('request.article', ['request' => $request_model]);
    }
    
}