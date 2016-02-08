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
Route::get('/news/content/{id}', 'NewsController@show_content');

Route::get('/supplies', 'PagesController@suppliesPage');

Route::get('/schedule/manage', 'PagesController@scheduleManagePage');

Route::get('/students', 'PagesController@studentsPage');

Route::get('/logout', 'PagesController@logout');

Route::get('/permission','PagesController@getPermission');

Route::post('/login', 'PagesController@login');

Route::get('/setting', 'SettingController@index');


Route::post('/register', 'PagesController@registerConfirm');
Route::get('/profile', 'PagesController@profilePage');

//News page
Route::post('open_modal', 'NewsController@open_modal');
Route::post('save_news', 'NewsController@save_news');
Route::post('remove_news', 'NewsController@remove_news');
Route::post('/update_news/{id}', 'NewsController@update_news');
Route::get('/create_news', 'NewsController@create_news');
Route::post('/create_news_content', 'NewsController@create_news_content');
