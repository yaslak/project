<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecoversSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recovers')->insert([
            'email' => true,
            'token' => false,
            'question_secrete_id' => 1,
            'response' => '00:00'
        ]);
    }
}
