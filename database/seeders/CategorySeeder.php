<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'category_name' => '仕事',
                'sort' => 1,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
            [
                'id' => 2,
                'category_name' => 'プライベート',
                'sort' => 2,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
            [
                'id' => 3,
                'category_name' => '勉強',
                'sort' => 3,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
            [
                'id' => 4,
                'category_name' => '筋トレ',
                'sort' => 4,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
            [
                'id' => 5,
                'category_name' => 'その他',
                'sort' => 5,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
        ]);
    }
}
