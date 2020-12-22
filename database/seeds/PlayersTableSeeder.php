<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders') -> insert([
            'female' => '女性',
        'male' => '男性',
        'other' => 'その他',
        'none' => '未回答',
        ]);
    }
}
