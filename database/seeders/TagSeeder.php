<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'id' => 1,
                'tag_name' => 'プログミング',
                'created_at' => '2022/01/01 11:11:11',
                'updated_at' => '2022/01/01 11:11:11',
            ],
            [
                'id' => 2,
                'tag_name' => '英語',
                'created_at' => '2022/01/02 11:11:11',
                'updated_at' => '2022/01/02 11:11:11',
            ],
            [
                'id' => 3,
                'tag_name' => 'ランニング',
                'created_at' => '2022/01/03 11:11:11',
                'updated_at' => '2022/01/03 11:11:11',
            ],
        ]);
    }
}
