<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_histories')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'title' => 'ToDo履歴1',
                'category_id' => 1,
                'content' => 'ToDoの内容1',
                'todo_created_at' => '2022/01/01 11:11:11',
                'created_at' => '2022/01/02 11:11:11',
                'updated_at' => '2022/01/02 11:11:11',
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'title' => 'ToDo履歴2',
                'content' => 'ToDoの内容2',
                'category_id' => 4,
                'todo_created_at' => '2022/01/01 11:11:11',
                'created_at' => '2022/01/05 11:11:11',
                'updated_at' => '2022/01/05 11:11:11',
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'title' => 'ToDo履歴3',
                'content' => 'ToDoの内容3',
                'category_id' => 3,
                'todo_created_at' => '2022/01/01 11:11:11',
                'created_at' => '2022/01/08 11:11:11',
                'updated_at' => '2022/01/08 11:11:11',
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'title' => 'ToDo履歴4',
                'content' => 'ToDoの内容4',
                'category_id' => 3,
                'todo_created_at' => '2022/01/01 11:11:11',
                'created_at' => '2022/01/08 11:11:11',
                'updated_at' => '2022/01/08 11:11:11',
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'title' => 'ToDo履歴5',
                'content' => 'ToDoの内容5',
                'category_id' => 3,
                'todo_created_at' => '2022/01/01 11:11:11',
                'created_at' => '2022/01/09 11:11:11',
                'updated_at' => '2022/01/09 11:11:11',
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'title' => 'ToDo履歴6',
                'content' => 'ToDoの内容6',
                'category_id' => 3,
                'todo_created_at' => '2022/01/01 11:11:11',
                'created_at' => '2022/01/10 11:11:11',
                'updated_at' => '2022/01/10 11:11:11',
            ],
        ]);
    }
}
