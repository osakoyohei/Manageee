<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_todo')->insert([
            [
                'id' => 1,
                'tag_id' => 1,
                'todo_id' => 1,
                'created_at' => '2022/01/11 11:11:11',
                'updated_at' => '2022/01/11 11:11:11',
            ],
            [
                'id' => 2,
                'tag_id' => 2,
                'todo_id' => 2,
                'created_at' => '2022/01/11 11:11:11',
                'updated_at' => '2022/01/11 11:11:11',
            ],
            [
                'id' => 3,
                'tag_id' => 3,
                'todo_id' => 3,
                'created_at' => '2022/01/11 11:11:11',
                'updated_at' => '2022/01/11 11:11:11',
            ],
            [
                'id' => 4,
                'tag_id' => 1,
                'todo_id' => 4,
                'created_at' => '2022/01/11 11:11:11',
                'updated_at' => '2022/01/11 11:11:11',
            ],
            [
                'id' => 5,
                'tag_id' => 1,
                'todo_id' => 6,
                'created_at' => '2022/01/11 11:11:11',
                'updated_at' => '2022/01/11 11:11:11',
            ],
        ]);
    }
}
