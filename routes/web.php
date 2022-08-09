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

Route::get('/', function(){
    return view('home');
})->name('index');

Route::group(['namespace' => 'Post'], function(){

    Route::get('/post', "IndexController")->name('post.index');
    Route::get('/post/create', "CreateController")->name('post.create');
    Route::get('/post/{post}', "DetailController")->name('post.detail');
    Route::post('/post', "StoreController")->name('post.store');
    Route::patch('/post/{post}', "UpdateController")->name('post.update');
    Route::delete('/post/{post}', "DestroyController")->name('post.destroy');
    Route::get('/post/{post}/edit', "EditController")->name('post.edit');
});

Route::group(['namespace' => 'Category'], function(){

    Route::get('/category', "IndexController")->name('category.index');
    Route::get('/category/create', "CreateController")->name('category.create');
    Route::post('/category', "StoreController")->name('category.store');
    Route::delete('/category/', "DestroyController")->name('category.destroy');
});

Route::group(["namespace" => "Tag"], function(){

    Route::get('/tag', "IndexController")->name('tag.index');
    Route::get('/tag/create', "CreateController")->name('tag.create');
    Route::post('/tag', "StoreController")->name('tag.store');
    Route::delete('/tag/{tag}', "DestroyController")->name('tag.destroy');
});

Route::get('/post/empty-trash', function(){
    App\Models\Post::onlyTrashed()->forceDelete();
    return redirect()->route('post.index');
})->name('post.empty-trash');

Route::get('/post/restore-from-trash', function(){
    App\Models\Post::onlyTrashed()->restore();
    return redirect()->route('post.index');
})->name('post.restore-from-trash');
