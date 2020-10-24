<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = DB::table('users')->first();

        DB::table('posts')->insert([
            'user_id' => $user->id,
            'title' =>  'タイトル。',
            'body' => 'テキスト。テキスト',
          ]);
    }
}