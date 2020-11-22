<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller{
    //投稿一覧ページを表示する。

    public function index()
    {
    $posts = Auth::user()->posts()->get();
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('posts.index', ['posts' => $posts]);
    }

    //投稿作成ページを表示する。
    public function showCreateForm()
    {
        return view('posts.create');
    }

    //投稿作成処理を実行する。
    public function create(Request $request)
    {
        // Postモデルのインスタンスを作成する
        $post = new Post();
        // タイトル
        $post->title = $request->title;
        //コンテンツ
        $post->body = $request->body;
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        // インスタンスの状態をデータベースに書き込む
        $post->save();

        // Auth::user()->posts()->save($post);

        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト        
        return redirect()->route('posts.index', [
            'post' => $post,
        ]);
    }
        
    //投稿編集ページを表示する。
    public function showEditForm($post_id)
    {

        $post = Post::findOrFail($post_id);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    //投稿編集処理を実行する。
    public function update($post_id, Request $request)
    {
        $post = Post::findOrFail($post_id);
        $post->title = $request->title;
        //コンテンツ
        $post->body = $request->body;
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        $post->save();
    
        return redirect()->route('posts.show', ['post_id' => $post->id]);
    }

    //投稿詳細ページを表示する。
    public function show($post_id)
    {
    $post = Post::findOrFail($post_id);

    return view('posts.show', [
        'post' => $post,
    ]);
    }

    //投稿削除処理を実行する。
    public function destroy($post_id)
    {
    $post = Post::findOrFail($post_id);

    \DB::transaction(function () use ($post) {

        $post->delete();
    });

    return redirect()->route('posts.index');
    }

}