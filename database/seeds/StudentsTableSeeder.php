<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 使用查询构造器
        DB::table('students')->insert([
            ['name' => 'linzenghui', 'age' => 18, 'sex' => 20],
            ['name' => 'lixuefeng', 'age' => 20, 'sex' => 30],
            ['name' => 'panqihui', 'age' => 21, 'sex' => 30],
            ['name' => 'lvlinlin', 'age' => 22, 'sex' => 30],
            ['name' => 'liguohong', 'age' => 19, 'sex' => 30],
        ]);
    }
}
