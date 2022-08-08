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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function(){
    return view('home');
})->name('index');

Route::get('/post/empty-trash', function(){
    App\Models\Post::onlyTrashed()->forceDelete();
    //App\Models\Category::onlyTrashed()->forceDelete();
    //App\Models\Tag::onlyTrashed()->forceDelete();
    return redirect()->route('post.index');
})->name('post.empty-trash');

Route::get('/post/restore-from-trash', function(){
    App\Models\Post::onlyTrashed()->restore();
    //App\Models\Category::onlyTrashed()->restore();
    //App\Models\Tag::onlyTrashed()->restore();
    return redirect()->route('post.index');
})->name('post.restore-from-trash');

Route::get('/post', "PostController@index")->name('post.index');
Route::get('/post/create', "PostController@create")->name('post.create');
Route::get('/post/{post}', "PostController@detail")->name('post.detail');
Route::post('/post', "PostController@store")->name('post.store');
Route::patch('/post/{post}', "PostController@update")->name('post.update');
Route::delete('/post/{post}', "PostController@destroy")->name('post.destroy');
Route::get('/post/{post}/edit', "PostController@edit")->name('post.edit');

Route::get('/category', "CategoryController@index")->name('category.index');
Route::get('/category/create', "CategoryController@create")->name('category.create');
Route::post('/category', "CategoryController@store")->name('category.store');
Route::delete('/category', "CategoryController@destroy")->name('category.destroy');

Route::get('/tag', "TagController@index")->name('tag.index');
Route::get('/tag/create', "TagController@create")->name('tag.create');
Route::post('/tag', "TagController@store")->name('tag.store');
Route::delete('/tag/{tag}', "TagController@destroy")->name('tag.destroy');



