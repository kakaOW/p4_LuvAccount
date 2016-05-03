<?php

use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $list_id = \App\Lists::where('id','=','1')->pluck('id')->first();
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 1,
            'date' => '2014-02-28',
            'title' => 'First day',
            'story' => 'She said yes! I planned our first trip the next day to Disney!',
            'points' => 1,
            'list_id' => $list_id
        ]);
        $list_id = \App\Lists::where('id','=','1')->pluck('id')->first();
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 2,
            'date' => '2014-06-04',
            'title' => 'Birthday',
            'story' => 'I bought an electronic piano as a gift for her birthday',
            'points' => 1,
            'list_id' => $list_id
        ]);
        $list_id = \App\Lists::where('id','=','2')->pluck('id')->first();
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 1,
            'date' => '2014-03-01',
            'title' => 'To Disney World!',
            'story' => 'I asked Jing to be my girlfriend and she said yes, so we went on to our first trip - Disney World',
            'points' => 1,
            'list_id' => $list_id
        ]);
        $list_id = \App\Lists::where('id','=','2')->pluck('id')->first();
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 2,
            'date' => '2014-03-02',
            'title' => 'Epcot',
            'story' => 'We went to Epcot and enjoyed the food around the world, a truly magical experience!',
            'points' => 1,
            'list_id' => $list_id
        ]);
        $list_id = \App\Lists::where('id','=','2')->pluck('id')->first();
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 3,
            'date' => '2014-03-03',
            'title' => 'Corn Dogs',
            'story' => 'I made all the plans to make Jing happy but corn dogs, coming out of nowhere, excited her the most...',
            'points' => 0,
            'list_id' => $list_id
        ]);
    }
}
