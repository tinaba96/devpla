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
    
    // //posting images
    // Route::post('upload', 'ImagesController@upload')->name('upload');
    // Route::get('/images/', 'ImagesController@index');


    // Route::get('/form',
	// [App\Http\Controllers\ImagesController::class, "show"]
	// )->name("upload_form");

    // Route::post('/uploads',
	// [App\Http\Controllers\ImagesController::class, "upload"]
	// )->name("upload_image");

    Route::get('/list',
	[App\Http\Controllers\ImageListController::class, "show"]
	)->name("image_list");


    Route::get('/home/like/{id}', 'LikeController@store')->name('like_home');
    Route::get('/home/unlike/{id}', 'LikeController@destroy')->name('unlike_home');
    
    Route::post('/post/{post}/like', 'LikeController@store')->name('likes');
    Route::post('/post/{post}/unlike', 'LikeController@destroy')->name('unlikes');
});





