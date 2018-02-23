<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'name123',
            'email' => 'email@email.email',
            'password' => bcrypt('000000'),
            'recover_id' => 1
        ]);
    }
}
