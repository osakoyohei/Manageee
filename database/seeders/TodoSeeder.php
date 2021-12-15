<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'user_id' => 1,
                'title' => 'test1',
                'content' => 'テスト1です。',
                'created_at' => '2021/01/01 11:11:11',
                'updated_at' => '2021/01/01 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test2',
                'content' => 'テスト2です。',
                'created_at' => '2021/01/02 11:11:11',
                'updated_at' => '2021/01/02 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test3',
                'content' => 'テスト3です。',
                'created_at' => '2021/01/03 11:11:11',
                'updated_at' => '2021/01/03 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test4',
                'content' => 'テスト4です。',
                'created_at' => '2021/01/04 11:11:11',
                'updated_at' => '2021/01/04 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test5',
                'content' => 'テスト5です。',
                'created_at' => '2021/01/05 11:11:11',
                'updated_at' => '2021/01/05 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test6',
                'content' => 'テスト6です。',
                'created_at' => '2021/01/06 11:11:11',
                'updated_at' => '2021/01/06 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test7',
                'content' => 'テスト7です。',
                'created_at' => '2021/01/07 11:11:11',
                'updated_at' => '2021/01/07 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test8',
                'content' => 'テスト8です。',
                'created_at' => '2021/01/08 11:11:11',
                'updated_at' => '2021/01/08 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test9',
                'content' => 'テスト9です。',
                'created_at' => '2021/01/09 11:11:11',
                'updated_at' => '2021/01/09 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test10',
                'content' => 'テスト10です。',
                'created_at' => '2021/01/10 11:11:11',
                'updated_at' => '2021/01/10 11:11:11',
            ],
        ]);
    }
}
