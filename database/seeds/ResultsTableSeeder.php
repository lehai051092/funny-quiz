<?php

use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = new \App\Result();
        $result->user_id=1;
        $result->save();

        $result = new \App\Result();
        $result->user_id=2;
        $result->save();

        $result = new \App\Result();
        $result->user_id=3;
        $result->save();
    }
}
