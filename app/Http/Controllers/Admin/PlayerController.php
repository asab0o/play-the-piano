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
    private $genders = [];
    private $prefectures = [];
    
    public function __construct()
    {
        // 配列を初期化
        $this->genders = $this->getGenders();
        $this->prefectures = $this->getPrefectures();
    }
    
    public function add()
    {
        $genders = $this->genders;
        $prefectures = $this->prefectures;
        
        return view('admin.player.create', compact('genders', 'prefectures'));
        // return view('admin.player.create', $gendersList, $prefList);
    }
    
    public function create(Request $request) {
        $this->validate($request, Player::$rules);
        $player = new Player;
        // 201230 user_idに値を入れる
        $player->user_id = $request->user()->id;
        $form = $request->all();
        // 都道府県をvalue値（配列のインデックス値になっている）ではなくnameで保存したい
        $pref = $this->prefectures[$form['prefecture']];
        $form['prefecture'] = $pref;
        
        
        for ($i = 1; $i <= 3; $i++) {
            if (isset($form['image'][$i])) {
                $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
                $player->{'image_path_'.$i} = Storage::disk('s3')->url($path);
                // $path = $request->file('image')[$i]->store('public/image');
                // $player->{"image_path_{$i}"} = basename($path);
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
    
    public function edit() {
        
        $genders = $this->genders;
        $prefectures = $this->prefectures;
        $player = Player::where('user_id', Auth::id())->first();
        
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
        
        $pref = $this->prefectures[$player_form['prefecture']];
        $player_form['prefecture'] = $pref;
        
        for ($i = 1; $i <= 3; $i++) {
            if (isset($player_form['image'][$i])) {
                $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
                $player->{'image_path_'.$i} = Storage::disk('s3')->url($path);
                // $path = $request->file('image')[$i]->store('public/image');
                // $player_form['image_path_'.$i] = basename($path);
            } elseif ($request->remove == 'true'){
                $player_form['image_path_'.$i] = null;
            } else {
                $player_form['image_path_'.$i]  = $player->{"image_path_{$i}"};
            }
        }
        
        unset($player_form['image']);
        unset($player_form['remove']);
        unset($player_form['_token']);
        $player->fill($player_form)->save();
        
        return redirect('admin/mypage'); 
    }
    
    public function delete(Request $request) {
        $player = Player::find($request->id);
        $player->delete();
        return redirect('admin/mypage');
    }
    
    
    private function getGenders()
    {
        // seederファイル通して配列を保存、とってくる
        $result = \DB::table('genders')->get()->all();
        return $result;
    }
    
    private function getPrefectures()
    {
        $result = \DB::table('prefectures')->get()->pluck("name");
        return $result;
    }
}
