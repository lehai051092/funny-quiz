<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = new \App\Test();
        $test->name = 'Toeic';
        $test->desc = 'Bài thi TOEIC truyền thống là một bài kiểm tra trắc nghiệm bao gồm 02 phần: phần thi Listening (nghe hiểu) gồm 100 câu, thực hiện trong 45 phút và phần thi Reading (đọc hiểu) cũng gồm 100 câu nhưng thực hiện trong 75 phút. Tổng thời gian làm bài là 120 phút (2 tiếng).';
        $test->category_id = 1;
        $test->save();

        $test = new \App\Test();
        $test->name = 'Ielts';
        $test->desc = 'IELTS là một bài kiểm tra trải dài qua cả bốn kĩ năng Nghe, Nói, Đọc, Viết. Trong phần thi Nói, bạn sẽ phải đối diện trực tiếp với những người chấm thi được chứng nhận. ';
        $test->category_id = 1;
        $test->save();

        $test = new \App\Test();
        $test->name = 'Violympic';
        $test->desc = 'Giải toán trực tuyến';
        $test->category_id = 2;
        $test->save();
    }
}
