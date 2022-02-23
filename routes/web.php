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
Route::get('/post/take-out-trash', function(){
    $posts = App\Models\Post::onlyTrashed()->get();
    foreach($posts as $post){
        $post->forceDelete();
    }
    return redirect()->route('post.index');
})->name('post.take_out_trash');
Route::get('/post', "PostController@index")->name('post.index');
Route::get('/post/create', "PostController@create")->name('post.create');
Route::get('/post/{post}', "PostController@detail")->name('post.detail');
Route::post('/post', "PostController@store")->name('post.store');
Route::patch('/post/{post}', "PostController@update")->name('post.update');
Route::delete('/post/{post}', "PostController@destroy")->name('post.destroy');
Route::get('/post/{post}/edit', "PostController@edit")->name('post.edit');


