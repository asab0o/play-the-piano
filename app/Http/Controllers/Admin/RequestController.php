<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Request;
use Carbon\Carbon;
use Storage;

class RequestController extends Controller
{
    // 配列の設定
    private $genres = [];
    
    public function __construct() {
        $this->genres = config('app.genres');
    }
    // .で区切る
    public function add(Request $request) {
        $genresList = [
            'genres' => $this->genres,
            ];
        return view('admin.request.create', $genresList);
    }
    
    public function create(Request $request) {
        // Repuestファザード？
        $this->validate($request, Request::$rules);
        $request = new Request;
        $form = $request->all();
        
        for ($i = 0; $i < 5; $i++) {
            if (isset($form['image'])) {
                $path = Storage::disk('s3')->putFile('/',$form['image'], 'public');
                $request->image_path = Storage::disk('s3')->url($path);
            } else {
                $request->image_path = null;
            }
        }
        unset($form['_token']);
        unset($form['image']);
        $request->fill($form)->save();
        return redirect('admin/mypage/index');
    }
    
    public function edit(Request $request) {
        $genresList = [
            'genres' => $this->genres,
            ];
        
        $request = Request::find($request->id);
        if (empty($request)) {
            abort(404);
        }
        
        return view('admin.request.edit', ['request_form' => $request], $genresList);
    }
    
    public function update(Request $request) {
        return redirect('admin/mypage/index');
    }
    
    public function delete(Request $request) {
        
    }
    
    
}
