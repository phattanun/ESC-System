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

// Default
Route::get('/', 'NewsController@all_news_no_page');

// News
Route::get ('/news', 'NewsController@all_news_no_page');
Route::get ('/news/all/', 'NewsController@all_news_no_page');
Route::get ('/news/all/{page}', 'NewsController@all_news');
Route::get ('/news/view/{id}', 'NewsController@show_content');
Route::post('/news/view/modal', 'NewsController@open_modal');
Route::get ('/news/create', 'NewsController@create_news');
Route::post('/news/create/content', 'NewsController@create_news_content');
Route::post('/news/upload/image', 'NewsController@upload_image');
Route::post('/news/update/{id}', 'NewsController@update_news');
Route::post('/news/remove', 'NewsController@remove_news');
Route::post('save_news', 'NewsController@save_news');

// Schedule
Route::get('/schedule/manage', 'PagesController@scheduleManagePage');

// Supply
Route::get('/supplies', 'PagesController@suppliesPage');

// Students
Route::get('/students', 'PagesController@studentsPage');

// Login/Logout Register
Route::post('/login', 'PagesController@login');
Route::get ('/logout', 'PagesController@logout');
Route::post('/register', 'PagesController@registerConfirm');


//Setting Page
Route::get ('/setting', 'SettingController@index');
Route::post('/setting/edit_year', 'SettingController@editYear');
Route::post('/setting/edit_permission', 'SettingController@editPermission');


Route::get ('/profile', 'PagesController@profilePage');
