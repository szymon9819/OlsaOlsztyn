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

    Route::resource('posts', Admin\Media\PostController::class);
    Route::post('/upload-post-image', 'Admin\Media\PostImageController@store')->name('post.image.store');

    Route::resource('categories', Admin\Media\PostCategoryController::class)->except('show');
    Route::resource('tags', Admin\Media\PostTagController::class)->except('show');

    Route::resource('leagues', Admin\League\LeagueController::class)->except('show');
    Route::resource('seasons', Admin\League\SeasonController::class)->except('show');
    Route::resource('matches', Admin\League\MatchController::class)->except('show');
    Route::resource('stadiums', Admin\League\StadiumController::class)->except('show');
});

Route::get('/{id}', 'Article\ArticleController@show')->name('article.show');


Route::get('/{any}', function ($any) {
    return view('welcome');
})->where('any', '.*');
