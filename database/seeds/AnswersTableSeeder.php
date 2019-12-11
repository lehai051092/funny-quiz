<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer=new \App\Answer();
        $answer->title='A';
        $answer->status=1;
        $answer->question_id=1;
        $answer->save();

        $answer=new \App\Answer();
        $answer->title='B';
        $answer->status=1;
        $answer->question_id=1;
        $answer->save();

        $answer=new \App\Answer();
        $answer->title='C';
        $answer->status=2;
        $answer->question_id=1;
        $answer->save();

        $answer=new \App\Answer();
        $answer->title='D';
        $answer->status=1;
        $answer->question_id=1;
        $answer->save();

        $answer=new \App\Answer();
        $answer->title='A';
        $answer->status=1;
        $answer->question_id=2;
        $answer->save();

        $answer=new \App\Answer();
        $answer->title='B';
        $answer->status=2;
        $answer->question_id=2;
        $answer->save();
    }
}
