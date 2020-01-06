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
        $question->title='Mark your answers on your answers sheet.';
        $question->quiz_id=1;
        $question->type_id=2;
        $question->category_id= 1;
        $question->save();

        $question=new \App\Question();
        $question->title='Who are you?';
        $question->quiz_id=1;
        $question->type_id=1;
        $question->category_id = 1;
        $question->save();

        $question=new \App\Question();
        $question->title='What is this?';
        $question->quiz_id=2;
        $question->type_id=1;
        $question->category_id = 2;
        $question->save();

        $question=new \App\Question();
        $question->title='What are you doing?';
        $question->quiz_id=3;
        $question->type_id=2;
        $question->category_id = 2;
        $question->save();
    }
}
