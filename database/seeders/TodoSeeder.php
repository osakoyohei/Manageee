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
            'user_id' => 1,
            'title' => 'test',
            'content' => 'テストです。',
            'created_at' => '2021/01/01 11:11:11',
            'updated_at' => '2021/01/01 11:11:11',
        ]);
    }
}
