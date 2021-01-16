<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;
use App\User;
use Auth;
// use App\Genders;
use Carbon\Carbon;
use Storage;

class PlayerController extends Controller
{
    // private $genders = [];
    // 調べる
    public function __construct()
    {
        // 201223 Seederの初期値をどうもってくるか
        // $this->genders = new PlayersTableSeed;
        $this->genders = $this->getGenders();
        $this->prefectures = $this->getPrefectures();
    }
    
    public function add()
    {
        $gendersList = [
                'genders' => $this->genders,
                ];
                
        $prefList = [
                'prefectures' => $this->prefectures,
                ];
        // $prefNameList = $prefList->pluck(“name”);
        // compact関数を使って配列渡せなかった        
        return view('admin.player.create', $gendersList, $prefList);
    }
    
    public function create(Request $request) {
        $this->validate($request, Player::$rules);
        $player = new Player;
        // 201230 user_idに値を入れる
        $player->user_id = $request->user()->id;
        $form = $request->all();
        
        // for文使えるのか
        // for ($i = 1; $i <= 3; $i++) {
        //     if (isset($form['image'][$i])) {
        //         $path = Storage::disk('s3')->putFile('/', $form['image'][$i], 'public');
        //         $player->image_path_.$i = Storage::disk('s3')->url($path);
        //     } else {
        //         $player->image_path_.$i = null;
        //     }
        // }
        // dd($request->file('image'));
        for ($i = 1; $i <= 3; $i++) {
            if (isset($form['image'][$i])) {
                $path = $request->file('image')[$i]->store('public/image');
                $player->{"image_path_{$i}"} = basename($path);
                // $player->{'image_path_'.$i} = basename($path);
                // $player->image_path_.$i = basename($path);
            } else {
                $player->{"image_path_{$i}"} = null;
            }
        }
        
        unset($form['_token']);
        unset($form['image']);
        $player->fill($form)->save();
        
        // 201229 users_idがnullでエラーが出るためその解消
        // $player->fill($form)->user()->associate($user)->save();
        
        // 一人のユーザーが複数個プロフィールを作成できてしまう
        // Request(演奏依頼)は問題ないが演奏者プロフィールは1人1つにしたい
        
        return redirect('/');
        
    }
    
    public function edit(Request $request) {
        
        $genders = $this->genders;
        $prefectures = $this->prefectures;

        $user = User::find($request->id);
        $player = Player::where('user_id', $user->id)->first();
        
        // プロフィールを登録していなかったら新規作成画面に飛ぶようにしている
        if(empty($player)) { 
            return view('admin.player.create', [
                'genders' => $genders,
                'prefectures' => $prefectures,
                ]);
         } 
        
        return view('admin.player.edit', [
            'player_form' => $player,
            'genders' => $genders,
            'prefectures' => $prefectures,
        ]); 
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Player::$rules);
        $player = Player::find($request->id);
        $player_form = $request->all();
        
        // dd($file('image'));
        // dd($player_form);
        // dd($request->file('image'));
        
        for ($i = 1; $i <= 3; $i++) {
            if (isset($player_form['image'][$i])) {
                $path = $request->file('image')[$i]->store('public/image');
                // dd($path);
                $player_form['image_path_'.$i] = basename($path);
            } elseif ($request->remove == 'true'){
                $player_form['image_path_'.$i] = null;
            } else {
                $player_form['image_path_'.$i]  = $player->{"image_path_{$i}"};
            }
        }
        // if ($request->remove == 'true') {
        //     $player_form['image_path'] = null;
        // } elseif (isset($player_form["image"])) {
        //     $path = Storage::disk('s3')->putFile('/', $player_form['image'], 'public');
        //     $player_form['image_path'] = Storage::disk('s3')->url($path);
        // } else {
        //     $player_form['image_path'] = $player->image_path;
        // }
        
        unset($player_form['image']);
        unset($player_form['remove']);
        unset($player_form['_token']);
        $player->fill($player_form)->save();
        
        return redirect('/'); 
    }
    
    public function delete(Request $request) {
        $player = Player::find($request->id);
        $player->delete();
        return redirect('/');
    }
    
    // クラス内だけで使う関数
    private function getGenders()
    {
        // 201227 訂正
        $result = \DB::table('genders')->get()->all();
        // dd($result);
        return $result;
    }
    
    private function getPrefectures()
    {
        $result = \DB::table('prefectures')->get()->pluck("name");
        // dd($result);
        return $result;
    }
}
