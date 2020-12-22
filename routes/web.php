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

Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('dashboard');

    Route::resource('posts', Admin\PostController::class);
    Route::post('/upload-post-image', 'Admin\PostImageController@store')->name('post.image.store');

    Route::resource('categories', Admin\PostCategoryController::class)->except('show');
    Route::resource('tags', Admin\PostTagController::class)->except('show');
});

Route::get('/{id}', 'Article\ArticleController@show')->name('article.show');


Route::get('/{any}', function ($any) {
    return view('welcome');
})->where('any', '.*');
