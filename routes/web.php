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

Route::redirect('/', '/articles/technology', 301);
Route::get('/articles/qiita', 'ArticleController@qiita')->name('articles.qiita');
Route::get('/articles/{category?}', 'ArticleController@news')->name('articles.news');


Auth::routes();
Route::namespace('Auth')->group(function () {
  Route::get('/logout', 'LoginController@getLogout');
});

Route::get('/home', 'HomeController@index')->name('home');
