<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'NewsController@all_news_no_page');
Route::get('/news', 'NewsController@index');
Route::get('/news/all/', 'NewsController@all_news_no_page');
Route::get('/news/all/{page}', 'NewsController@all_news');

Route::get('/supplies', 'PagesController@suppliesPage');

Route::get('schedule/manage', 'PagesController@scheduleManagePage');

Route::get('/logout','PagesController@logout');

Route::post('/login','PagesController@login');

//News page
Route::post('open_modal','NewsController@open_modal');