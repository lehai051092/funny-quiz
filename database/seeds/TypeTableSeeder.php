<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new \App\Type();
        $type->id = 1;
        $type->name = 'Many Question';
        $type->save();

        $type = new \App\Type();
        $type->id = 2;
        $type->name = 'True/False';
        $type->save();
    }
}
