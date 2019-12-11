<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category();
        $category->id = 1;
        $category->name = 'Tiếng Anh';
        $category->save();

        $category = new \App\Category();
        $category->id = 2;
        $category->name = 'Toán';
        $category->save();
    }
}
