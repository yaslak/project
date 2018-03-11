<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            'first_name' => 'yasser',
            'last_name' => 'lakhsadi',
            'dtn' => '1987-07-20',
            'sex' => 'Homme',
            'address' => 'BD mohamed 6 jamila I',
            'house_nbr' => '1443',
            'city' => 'casablanca',
            'tel' => '0683574565',
            'slug' => 'yasser-lakhsadi-65'
        ]);
    }
}

