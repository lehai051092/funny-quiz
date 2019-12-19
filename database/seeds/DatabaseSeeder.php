<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(QuizTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(PointsTableSeeder::class);
        $this->call(ResultDetailsTableSeeder::class);
        $this->call(ResultsTableSeeder::class);
        $this->call(PointsTableSeeder::class);
    }
}
