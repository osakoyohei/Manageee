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
                'user_id' => 1,
                'title' => 'test1',
                'content' => 'テスト1です。',
                'category_id' => 1,
                'created_at' => '2021/12/01 11:11:11',
                'updated_at' => '2021/12/01 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test2',
                'content' => 'テスト2です。',
                'category_id' => 1,
                'created_at' => '2021/12/02 11:11:11',
                'updated_at' => '2021/12/02 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test3',
                'content' => 'テスト3です。',
                'category_id' => 1,
                'created_at' => '2021/12/03 11:11:11',
                'updated_at' => '2021/12/03 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test4',
                'category_id' => 2,
                'content' => 'テスト4です。',
                'created_at' => '2021/12/04 11:11:11',
                'updated_at' => '2021/12/04 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test5',
                'category_id' => 3,
                'content' => 'テスト5です。',
                'created_at' => '2021/12/05 11:11:11',
                'updated_at' => '2021/12/05 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test6',
                'content' => 'テスト6です。',
                'category_id' => 1,
                'created_at' => '2021/12/06 11:11:11',
                'updated_at' => '2021/12/06 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test7',
                'content' => 'テスト7です。',
                'category_id' => 1,
                'created_at' => '2021/12/07 11:11:11',
                'updated_at' => '2021/12/07 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test8',
                'content' => 'テスト8です。',
                'category_id' => 1,
                'created_at' => '2021/12/08 11:11:11',
                'updated_at' => '2021/12/08 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test9',
                'content' => 'テスト9です。',
                'category_id' => 1,
                'created_at' => '2021/12/09 11:11:11',
                'updated_at' => '2021/12/09 11:11:11',
            ],
            [
                'user_id' => 1,
                'title' => 'test10',
                'content' => 'テスト10です。',
                'category_id' => 1,
                'created_at' => '2021/12/10 11:11:11',
                'updated_at' => '2021/12/10 11:11:11',
            ],
        ]);
    }
}
