<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// vueのテスト用↓
Route::get('/test', function () {
    return view('welcome');
});

Route::get('/', 'UsersController@lp')->name('lp');

Auth::routes();

//投稿フォームページ
Route::group(['middleware' => 'auth'], function() {
    
    //投稿一覧確認ページ
    Route::get('/homeposts', 'PostsController@index')->name('posts.index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/post', 'PostsController@showCreateForm')->name('posts.create');
    Route::post('/post', 'PostsController@create');

    //投稿詳細確認ページ
    Route::get('/post/{post_id}', 'PostsController@show')->name('posts.show');

    //編集確認ページ
    Route::get('/post/{post_id}/edit', 'PostsController@showEditForm')->name('posts.edit');
    Route::put('/post/{post_id}/edit', 'PostsController@update')->name('posts.update');

    //投稿削除
    Route::delete('/post/{post_id}', 'PostsController@destroy')->name('posts.destroy');

    //コメント作成
    Route::post('/post/{post_id}', 'CommentsController@store')->name('comments.store');

    Route::get('/list', 'ImagesController@show')->name("image_list");

    Route::get('/home/like/{id}', 'LikeController@store')->name('like_home');
    Route::get('/home/unlike/{id}', 'LikeController@destroy')->name('unlike_home');
    
    Route::post('/post/{post}/like', 'LikeController@store')->name('likes');
    Route::post('/post/{post}/unlike', 'LikeController@destroy')->name('unlikes');

    Route::get('/home/like/{id}', 'LikeController@store')->name('like_home');
    Route::get('/home/unlike/{id}', 'LikeController@destroy')->name('unlike_home');
    
    Route::post('/post/{post}/like', 'LikeController@store')->name('likes');
    Route::post('/post/{post}/unlike', 'LikeController@destroy')->name('unlikes');

    //ユーザーページ表示
    Route::get('/mypage', 'HomeController@show')->name('mypage');
    Route::get('/mypage/edit', 'HomeController@edit');
    Route::patch('/mypage/edit', 'HomeController@update');

    //ユーザー削除
    Route::resource('users','UsersController',['only'=>['show','destroy']]); //destroyを追記
    Route::get('/user/delete','UsersController@delete_confirm')->name('users.delete_confirm'); //警告画面に飛ばしたいため追記

    Route::get('/mypage/image/edit', 'HomeController@edit_image');
    Route::patch('/mypage/image/{user}/edit', 'HomeController@update_image')->name('update_user_image');

    Route::get('/users', 'HomeController@users')->name('users_list');

    Route::get('/users/{user}', 'HomeController@user');
    
    Route::Post('/users/{followed_id}/follow', 'FollowController@follow');
    Route::Delete('/users/{followed_id}/unfollow', 'FollowController@unfollow');

    Route::get('/users/{id}/following', 'FollowController@following');
    Route::get('/users/{id}/followers', 'FollowController@followers');

    Route::get('/result/ajax', 'ChatController@getData');

    Route::get('/homechat', 'ChatController@home')->name('homechat');

    Route::post('/homechat', 'ChatController@store');
    Route::get('/homechat/create', 'ChatController@create');
    Route::get('/homechat/{chatgroup}', 'ChatController@chat');
    Route::post('/homechat/{chatgroup}', 'ChatController@add');
    Route::get('/homechat/{chatgroup}/members', 'ChatController@members');
    Route::post('/homechat/{chatgroup}/bemember', 'ChatController@bemember');

    Route::get('/adminhome', 'AdminController@home')->name('admin');


});
