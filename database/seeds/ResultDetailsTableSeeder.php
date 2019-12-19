<?php

use Illuminate\Database\Seeder;

class ResultDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resultDetail= new \App\ResultDetail();
        $resultDetail->quiz_id=1;
        $resultDetail->result_id=1;
        $resultDetail->save();

        $resultDetail= new \App\ResultDetail();
        $resultDetail->quiz_id=1;
        $resultDetail->result_id=2;
        $resultDetail->save();

        $resultDetail= new \App\ResultDetail();
        $resultDetail->quiz_id=2;
        $resultDetail->result_id=1;
        $resultDetail->save();

        $resultDetail= new \App\ResultDetail();
        $resultDetail->quiz_id=2;
        $resultDetail->result_id=2;
        $resultDetail->save();
    }
}
