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
        
        // 201227 訂正
        DB::table('genders')->insert([
            ['type' => 'female', 'name' => '女性'],
            ['type' => 'male', 'name' => '男性'],
            ['type' => 'other', 'name' => 'その他'],
            ['type' => 'none', 'name' => '未回答'],
         ]);
        
        DB::table('prefectures')->insert([
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
        
         
        //  DB::table('prefectures')->insert(
        //     '北海道' => array('hokkaido'=>'北海道'),
        //     '東北' => array('aomori'=>'青森県','iwate'=>'岩手県','miyagi'=>'宮城県','akita'=>'秋田県','yamagata'=>'山形県','fukushima'=>'福島県'),
        //     '関東' => array('ibaraki'=>'茨城県','tochigi'=>'栃木県','gunma'=>'群馬県','saitama'=>'埼玉県','chiba'=>'千葉県','tokyo'=>'東京都','kanagawa'=>'神奈川県'),
        //     '中部' => array('niigata'=>'新潟県','yamanashi'=>'富山県','nagano'=>'石川県','toyama'=>'福井県','ishikawa'=>'山梨県','fukui'=>'長野県','gifu'=>'岐阜県','shizuoka'=>'静岡県','aichi'=>'愛知県'),
        //     '近畿' => array('mie'=>'三重県','shiga'=>'滋賀県','kyoto'=>'京都府','osaka'=>'大阪府','hyogo'=>'兵庫県','nara'=>'奈良県','wakayama'=>'和歌山県'),
        //     '中国' => array('tottori'=>'鳥取県','shimane'=>'島根県','oakayama'=>'岡山県','hiroshima'=>'広島県','yamaguchi'=>'山口県'),
        //     '四国' => array('tokushima'=>'徳島県','kagawa'=>'香川県','ehime'=>'愛媛県','kochi'=>'高知県'),
        //     '九州沖縄' => array('fukuoka'=>'福岡県','saga'=>'佐賀県','nagasaki'=>'長崎県','kumamoto'=>'熊本県','oita'=>'大分県','miyazaki'=>'宮崎県','kagoshima'=>'鹿児島県','okinawa'=>'沖縄県')
        // );
         
         
    }
}
    