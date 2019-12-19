<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $point=new \App\Point();
        $point->point=6;
        $point->quiz_id=1;
        $point->save();

        $point=new \App\Point();
        $point->point=8;
        $point->quiz_id=1;
        $point->save();

        $point=new \App\Point();
        $point->point=9;
        $point->quiz_id=2;
        $point->save();

        $point=new \App\Point();
        $point->point=6;
        $point->quiz_id=3;
        $point->save();
    }
}
