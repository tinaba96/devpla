<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 50)->create();

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'dummy@email.com',
            'password' => bcrypt('Revowater1108'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => '安倍晋三',
            'email' => 'revowater@gmail.com',
            'password' => bcrypt('Revowater1108'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'profile_image' => 'https://i.pravatar.cc/300',
        ]);

        DB::table('users')->insert([
            'name' => 'トランプ大統領',
            'email' => 'revowater@outlook.com',
            'password' => bcrypt('Revowater1108'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'profile_image' => 'https://snowman-1.s3.ap-northeast-1.amazonaws.com/devpla/trump.jpg',
        ]);

        DB::table('users')->insert([
            'name' => '大臣',
            'email' => 'revowater@icloud.com',
            'password' => bcrypt('Revowater1108'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}