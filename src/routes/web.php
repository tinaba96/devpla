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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('index', 'PostsController@index')->name('top');

Auth::routes();



//投稿フォームページ
Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'PostsController@index')->name('posts.index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/post', 'PostsController@showCreateForm')->name('posts.create');
    Route::post('/post', 'PostsController@create');

    //投稿確認ページ
    Route::get('/post/{post_id}', 'PostsController@show')->name('posts.show');

    Route::get('/post/{post_id}/edit', 'PostsController@showEditForm')->name('posts.edit');

    Route::put('/post/{post_id}/edit', 'PostsController@update')->name('posts.update');

    Route::delete('/post/{post_id}', 'PostsController@destroy')->name('posts.destroy');
    

});





