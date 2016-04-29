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
            'subject' => 'Love',
            'description' => 'A log of our ups and downs throughout our relationship',
            'totalPoint' => '100'
        ]);

        DB::table('lists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'subject' => 'Disney',
            'description' => 'Our ups and downs at Disney 迪士尼',
            'totalPoint' => '100'
        ]);
    }
}
