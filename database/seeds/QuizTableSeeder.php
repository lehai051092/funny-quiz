<?php

use Illuminate\Database\Seeder;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz = new \App\Quiz();
        $quiz->name = 'Đề thi TOEIC rút gọn';
        $quiz->desc = '~20 phút / đề, có đáp án và giải thích chi tiết, giúp bạn luyện tập thường xuyên';
        $quiz->test_id = 1;
        $quiz->save();

        $quiz = new \App\Quiz();
        $quiz->name = 'Đề thi TOEIC (Toeic full tests)';
        $quiz->desc = '~20 phút / đề, có đáp án và giải thích chi tiết, giúp bạn luyện tập thường xuyên';
        $quiz->test_id = 1;
        $quiz->save();

        $quiz = new \App\Quiz();
        $quiz->name = 'Đề thi IELTS 1';
        $quiz->desc = '~20 phút / đề, có đáp án và giải thích chi tiết, giúp bạn luyện tập thường xuyên';
        $quiz->test_id = 2;
        $quiz->save();


    }
}
