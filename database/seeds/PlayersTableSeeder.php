<?php

use Illuminate\Database\Seeder;

use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // シーダーで初期値設定
        // Player::create([
        //     'female' => '女性',
        //     'male' => '男性',
        //     'other' => 'その他',
        //     'none' => '未回答',
        // ]);
        
        DB::table('genders')->insert([
            ['type' => 'female', 'name' => '女性'],
            ['type' => 'male', 'name' => '男性'],
            ['type' => 'other', 'name' => 'その他'],
            ['type' => 'none', 'name' => '未回答'],
         ]);
    }
}
    