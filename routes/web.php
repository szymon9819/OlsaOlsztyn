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

Route::get('/', 'WelcomeController@index')->name('welcome');


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function (){
    Route::get('/','Admin\AdminController@index')->name('dashboard');

    Route::resource('posts', Admin\PostController::class);
    Route::resource('categories', Admin\PostCategoryController::class)->except('show');
//    Route::get('/posts', 'Admin\PostController@index')->name('admin.posts');
//    Route::get('/posts/create', 'Admin\PostController@create')->name('admin.posts.create');
//    Route::post('/posts', 'Admin\PostController@store')->name('admin.posts.store');
//    Route::get('/posts/{post}', 'Admin\PostController@show')->name('admin.posts.show');
//    Route::get('/posts/{post}/edit', 'Admin\PostController@edit')->name('admin.posts.edit');
//    Route::patch('/posts/{post}/edit', 'Admin\PostController@update')->name('admin.posts.update');
//    Route::delete('/posts/{post}', 'Admin\PostController@destroy')->name('admin.posts.destroy');
});




//Route::get('/', 'WelcomeController@index')->name('home');
Route::get('/{any}', function ($any) {
    return view('welcome');
})->where('any', '.*');
