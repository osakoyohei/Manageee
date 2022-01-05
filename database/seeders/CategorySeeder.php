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
                'name' => '仕事',
                'sort' => 1,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
            [
                'id' => 2,
                'name' => 'プライベート',
                'sort' => 2,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
            [
                'id' => 3,
                'name' => 'その他',
                'sort' => 3,
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
        ]);
    }
}
