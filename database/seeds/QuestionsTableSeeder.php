<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question=new \App\Question();
        $question->title='Mark your answer on your answer sheet.';
        $question->quiz_id=1;
        $question->save();

        $question=new \App\Question();
        $question->title='Who are you?';
        $question->quiz_id=1;
        $question->save();

        $question=new \App\Question();
        $question->title='What is this?';
        $question->quiz_id=2;
        $question->save();

        $question=new \App\Question();
        $question->title='Whatare you doing?';
        $question->quiz_id=3;
        $question->save();
    }
}
