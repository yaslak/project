<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(QuestionsSeeds::class);
        $this->call(RecoversSeeds::class);
        $this->call(UserSeeds::class);
    }
}
