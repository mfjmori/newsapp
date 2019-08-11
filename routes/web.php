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

Route::redirect('/', '/articles/technology');
Route::get('/about', function(){
  return view('about');
})->name('about');
Route::get('/articles/qiita', 'ArticleController@qiita')->name('articles.qiita');
Route::get('/articles/recommend', 'ArticleController@recommend')->name('articles.recommend');
Route::get('/articles/{category?}', 'ArticleController@news')->name('articles.news');
Route::resource('stocks', 'StockController', ['only' => ['index', 'store', 'destroy']])->middleware('auth');

Auth::routes();
Route::namespace('Auth')->group(function () {
  Route::get('/logout', 'LoginController@logout');
});
