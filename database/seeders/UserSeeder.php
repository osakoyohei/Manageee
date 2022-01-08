<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'ゲストユーザー',
                'email' => 'guest@guest.com',
                'password' => Hash::make('password'),
                'created_at' => '2021/01/01 11:11:11',
                'updated_at' => '2021/01/01 11:11:11',
            ],
            [
                'id' => 2,
                'name' => 'テスト',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
                'created_at' => '2021/01/01 11:11:11',
                'updated_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
