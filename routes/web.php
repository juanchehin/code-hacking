<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);
Route::get('/post/{id}','AdminPostsController@post')->name('post');;

// Llamo al middleware
Route::group(['middleware'=>'admin'], function() { 
    
    Route::get('/admin', function() {
        return view('layouts.admin1');
    });

    Route::resource('admin/users','AdminUserController');

    Route::resource('admin/posts','AdminPostsController');

    Route::resource('admin/categories','AdminCategoriesController');

    Route::resource('admin/categories','AdminCategoriesController');

    Route::resource('admin/comments','PostsCommentController');

    Route::delete('admin/delete/media','AdminMediaController@deleteMedia');

    Route::resource('admin/comments/replies','CommentRepliesController');

    // Route::get('admin/media/upload',['as'=>'admin.media.upoload','uses'=>'AdminMediaController@upload']);
    
});

// Route::resource('admin/users','AdminUserController');
Route::group(['middleware'=>'auth'], function() { 

    Route::post('comment/reply','CommentRepliesController@createReply');

});

