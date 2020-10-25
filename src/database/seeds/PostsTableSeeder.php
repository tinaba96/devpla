<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' =>  'タイトル。',
            'body' => 'テキスト。テキスト。テキスト。テキスト。テキスト。',
          ]);
    
    }
}