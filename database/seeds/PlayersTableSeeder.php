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
        
        // 201227 訂正
        DB::table('genders')->insert([
            ['type' => 'female', 'name' => '女性'],
            ['type' => 'male', 'name' => '男性'],
            ['type' => 'other', 'name' => 'その他'],
            ['type' => 'none', 'name' => '未回答'],
         ]);
         
        DB::table('area')->insert([
            ['type' => 'hokkaido', 'name' => '北海道'],
            ['type' => 'aomori', 'name' => '青森'],
            ['type' => 'iwate', 'name' => '岩手'],
            ['type' => 'miyagi', 'name' => '宮城'],
            ['type' => 'akita', 'name' => '秋田'],
            ['type' => 'yamagata', 'name' => '山形'],
            ['type' => 'fukushima', 'name' => '福島'],
            ['type' => 'ibaraki', 'name' => '茨城'],
            ['type' => 'tochigi', 'name' => '栃木'],
            ['type' => 'gunma', 'name' => '群馬'],
            ['type' => 'saitama', 'name' => '埼玉'],
            ['type' => 'chiba', 'name' => '千葉'],
            ['type' => 'tokyo', 'name' => '東京'],
            ['type' => 'kanagawa', 'name' => '神奈川'],
            ['type' => 'niigata', 'name' => '新潟'],
            ['type' => 'toyama', 'name' => '富山'],
            ['type' => 'ishikawa', 'name' => '石川'],
            ['type' => 'fukui', 'name' => '福井'],
            ['type' => 'yamanashi', 'name' => '山梨'],
            ['type' => 'nagano', 'name' => '長野'],
            ['type' => 'gifu', 'name' => '岐阜'],
            ['type' => 'shizuoka', 'name' => '静岡'],
            ['type' => 'aichi', 'name' => '愛知'],
            ['type' => 'mie', 'name' => '三重'],
            ['type' => 'shiga', 'name' => '滋賀'],
            ['type' => 'kyoto', 'name' => '京都'],
            ['type' => 'osaka', 'name' => '大阪'],
            ['type' => 'hyogo', 'name' => '兵庫'],
            ['type' => 'nara', 'name' => '奈良'],
            ['type' => 'wakayama', 'name' => '和歌山'],
            ['type' => 'tottori', 'name' => '鳥取'],
            ['type' => 'shimane', 'name' => '島根'],
            ['type' => 'okayama', 'name' => '岡山'],
            ['type' => 'hiroshima', 'name' => '広島'],
            ['type' => 'yamaguchi', 'name' => '山口'],
            ['type' => 'tokushima', 'name' => '徳島'],
            ['type' => 'kagawa', 'name' => '香川'],
            ['type' => 'ehime', 'name' => '愛媛'],
            ['type' => 'kochi', 'name' => '高知'],
            ['type' => 'fukuoka', 'name' => '福岡'],
            ['type' => 'saga', 'name' => '佐賀'],
            ['type' => 'nagasaki', 'name' => '長崎'],
            ['type' => 'kumamoto', 'name' => '熊本'],
            ['type' => 'oita', 'name' => '大分'],
            ['type' => 'miyazaki', 'name' => '宮崎'],
            ['type' => 'kagoshima', 'name' => '鹿児島'],
            ['type' => 'okinawa', 'name' => '沖縄'],
         ]);
         
         
    }
}
    