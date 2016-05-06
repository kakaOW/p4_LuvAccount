<?php

use Illuminate\Database\Seeder;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'subject' => 'Get Fit',
            'description' => 'Trying to loose weight and maintain healthy diet',
            'totalPoint' => '100',
            'user_id' => '1'
        ]);

        DB::table('lists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'subject' => 'Christmas Present',
            'description' => 'If Nick behaves well and get 100 points, he will get an iPhone for Christmas',
            'totalPoint' => '100',
            'user_id' => '1'
        ]);

        DB::table('lists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'subject' => '愛情帳戶',
            'description' => '屬於熊熊跟寶寶的愛情加減分',
            'totalPoint' => '100',
            'user_id' => '3'
        ]);
    }
}
