<?php

namespace Database\Seeders;

use App\Models\Category;
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
                'id' => 1,
                'user_id' => 1,
                'title' => 'test1',
                'content' => 'テスト1です。',
                'category_id' => 1,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'title' => 'test2',
                'content' => 'テスト2です。',
                'category_id' => 2,
                'created_at' => '2022/01/02 11:11:11',
                'updated_at' => '2022/01/02 11:11:11',
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'title' => 'test3',
                'content' => 'テスト3です。',
                'category_id' => 1,
                'created_at' => '2022/01/03 11:11:11',
                'updated_at' => '2022/01/03 11:11:11',
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'title' => 'test4',
                'category_id' => 2,
                'content' => 'テスト4です。',
                'created_at' => '2022/01/04 11:11:11',
                'updated_at' => '2022/01/04 11:11:11',
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'title' => 'test5',
                'category_id' => 3,
                'content' => 'テスト5です。',
                'created_at' => '2022/01/05 11:11:11',
                'updated_at' => '2022/01/05 11:11:11',
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'title' => 'test6',
                'content' => 'テスト6です。',
                'category_id' => 4,
                'created_at' => '2022/01/06 11:11:11',
                'updated_at' => '2022/01/06 11:11:11',
            ],
            [
                'id' => 7,
                'user_id' => 1,
                'title' => 'test7',
                'content' => 'テスト7です。',
                'category_id' => 1,
                'created_at' => '2022/01/07 11:11:11',
                'updated_at' => '2022/01/07 11:11:11',
            ],
            [
                'id' => 8,
                'user_id' => 1,
                'title' => 'test8',
                'content' => 'テスト8です。',
                'category_id' => 2,
                'created_at' => '2022/01/08 11:11:11',
                'updated_at' => '2022/01/08 11:11:11',
            ],
            [
                'id' => 9,
                'user_id' => 1,
                'title' => 'test9',
                'content' => 'テスト9です。',
                'category_id' => 3,
                'created_at' => '2022/01/09 11:11:11',
                'updated_at' => '2022/01/09 11:11:11',
            ],
            [
                'id' => 10,
                'user_id' => 1,
                'title' => 'test10',
                'content' => 'テスト10です。',
                'category_id' => 5,
                'created_at' => '2022/01/10 11:11:11',
                'updated_at' => '2022/01/10 11:11:11',
            ],
        ]);
    }
}
