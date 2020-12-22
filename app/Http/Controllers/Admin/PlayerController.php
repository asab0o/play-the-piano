<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;
use Carbon\Carbon;
use Storage;

class PlayerController extends Controller
{
    private $genders = [];
    // 調べる
    public function __construct() {
        $this->genders = config('app.genders');
    }
    
    public function add() {
        // 外に出せないか
        $gendersList = [
                'genders' => $this->genders,
                ];
            return view('admin.player.create', $gendersList);
    }
    
    public function create(Request $request){
        $this->validate($request, Player::$rules);
        $player = new Player;
        $form = $request->all();
        
        // for文使えるのか
        for ($i = 1; $i <= 3; $i++) {
            if (isset($form['image'.$i])) {
                $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
                $player->image_path_.$i = Storage::disk('s3')->url($path);
            } else {
                $player->image_path_.$i = null;
            }
        }
        
        unset($form['_token']);
        unset($form['image']);
        $player->fill($form)->save();
        return redirect('admin/mypage/index');
        
    }
    
    public function edit(Request $request) {
        
        $gendersList = [
                'genders' => $this->genders,
                ];
                
        $player = Player::find($request->id);
        if(empty($player)) {
            abort(404);
      }
       return view('admin.player.edit', ['player_form' => $player], $gendersList); 
    }
    
    public function update() {
        $this->validate($request, Player::$rules);
        $player = Player::find($request->id);
        $player_form = $request->all();
        
        if ($request->remove == 'true') {
            $player_form['image_path'] = null;
        } elseif (isset($player_form["image"])) {
            $path = Storage::disk('s3')->putFile('/', $player_form['image'], 'public');
            $player_form['image_path'] = Storage::disk('s3')->url($path);
        } else {
            $player_form['image_path'] = $player->image_path;
        }
        
        return redirect('admin/mypage/index'); 
    }
    
    public function delete(Request $request) {
        $player = Player::find($player->id);
        $player->delete();
        return redirect('admin/mypage/index');
    }
}
