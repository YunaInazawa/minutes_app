<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class genresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テストデータ
        $names = ['新入生歓迎会2019', '送別会2019', '赤ちゃん本舗2019'];
        $now = Carbon::now();
        foreach( $names as $name ){
            DB::table('genres')->insert([
                'genre_name' => $name, 
                'created_at' => $now, 
                'updated_at' => $now
            ]);
        }
    }
}
