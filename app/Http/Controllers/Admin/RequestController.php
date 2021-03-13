<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Request as RequestModel;
use App\User;
use Auth;
use Carbon\Carbon;
use Storage;

class RequestController extends Controller
{
    private $genres = [];
    private $prefectures = [];
    
    public function __construct()
    {
        $this->genres = config('app.genres');
        $this->prefectures = $this->getPrefectures();
    }
    
    public function add() {
        
        $genres = $this->genres;
        $prefectures = $this->prefectures;
        
        return view('admin.request.create', compact('genres', 'prefectures'));
    }
    
    public function create(Request $request) {
        // Repuestファザード？
        $this->validate($request, RequestModel::$rules);
        $request_model = new RequestModel;
        $request_model->user_id = $request->user()->id;
        $form = $request->all();
        
        $pref = $this->prefectures[$form['area']];
        $form['area'] = $pref;
        // for ($i = 0; $i < 5; $i++) {
        //     if (isset($form['image'])) {
        //         $path = Storage::disk('s3')->putFile('/',$form['image'], 'public');
        //         $request->image_path = Storage::disk('s3')->url($path);
        //     } else {
        //         $request->image_path = null;
        //     }
        // }
        for ($i = 1; $i <= 5; $i++) {
            if (isset($form['image'][$i])) {
                $path = $request->file('image')[$i]->store('public/image');
                $request_model->{'image_path_'.$i} = basename($path);
              } else {
                  $request_model->{'image_path_'.$i} = null;
              }
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $request_model->fill($form);
        // dd($request_model);
        $request_model->fill($form)->save();
        
        
        return redirect('/');
    }
    
    public function edit(Request $request) {
        // $genresList = [
        //     'genres' => $this->genres,
        //     ];

        $genres = $this->genres;
        $prefectures = $this->prefectures;
        $request_model = RequestModel::find($request->id);
        
        if (empty($request_model)) {
            return view('admin.request.create');
        } else {
            return view('admin.request.edit', [
                'request_form' => $request_model,
                'genres' => $genres,
                'prefectures' => $prefectures,
                ]);
        }
    }
    
    public function update(Request $request) {
        $this->validate($request, RequestModel::$rules);
        $request_model = RequestModel::find($request->id);
        $request_form = $request->all();
        
        $pref = $this->prefectures[$request_form['area']];
        $request_form['area'] = $pref;
        
        for ($i = 1; $i <= 5; $i++) {
            if ($request->remove) {
                $request_form['image_path_'.$i] = null;
            } elseif (isset($request_form['image'][$i])) {
                $path = $request->file('image')[$i]->store('public/image');
                $request_form['image_path_'.$i] = basename($path);
            } else {
                $request_form['image_path_'.$i] = $request_model->{'image_path_'.$i};
            }
        }
        
        unset($request_form['image']);
        unset($request_form['remove']);
        unset($request_form['_token']);
        $request_model->fill($request_form)->save();
        
        return redirect('admin/mypage');
    }
    
    public function delete(Request $request) {
        $request_model = RequestModel::find($request->id);
        $request_model->delete();
        return redirect('admin/mypage');
    }
    
    private function getPrefectures()
    {
        $result = \DB::table('prefectures')->get()->pluck("name");
        return $result;
    }
}
