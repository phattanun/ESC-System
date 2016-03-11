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
Route::get('/', 'NewsController@view_home');

// News
Route::get ('/news', 'NewsController@view');
Route::get ('/news/all/', 'NewsController@view');
Route::get ('/news/all/{page}', 'NewsController@view_page');
Route::get ('/news/view/{news_id}', 'NewsController@view_content');
Route::post('/news/view/modal', 'NewsController@view_modal');
Route::get ('/news/create', 'NewsController@create');
Route::post('/news/create/content', 'NewsController@create_content');
Route::post('/news/upload/image', 'NewsController@upload_image');
Route::post('/news/update/{news_id}', 'NewsController@update');
Route::post('/news/remove', 'NewsController@remove');
Route::post('save_news', 'NewsController@save_news');

// Meeting Room
Route::get ('/room/result', 'RoomController@viewResultPage');
Route::get ('/room/reserve', 'RoomController@viewReservePage');
Route::post('/room/user/submit_request', 'RoomController@UserSubmitRequest');
Route::get ('/room/room-manage', 'RoomController@roomManagePage');
Route::post('/room/room-manage/edit_room', 'RoomController@editRoom');

// Supply
Route::get ('/supplies', 'PagesController@suppliesPage');

// Students
Route::get ('/students', 'StudentController@studentsPage');
Route::post('/students/search', 'StudentController@search');

// Login/Logout Register
Route::post('/login', 'PagesController@login');
Route::get ('/logout', 'PagesController@logout');
Route::post('/register', 'PagesController@registerConfirm');

// Setting Page
Route::get ('/setting', 'SettingController@index');
Route::get ('/setting/auto_suggest', 'SettingController@autoSuggest');
Route::post('/setting/edit_year', 'SettingController@editYear');
Route::post('/setting/edit_permission', 'SettingController@editPermission');
Route::post('/setting/delete_permission', 'SettingController@deletePermission');
Route::post('/setting/add_new_permission', 'SettingController@addNewPermission');

// Activity Page
Route::get('/activity/create','ActivityController@create');
Route::get('/activity/auto_suggest','ActivityController@autoSuggest');
Route::post('/activity/create/addEditor','ActivityController@addEditor');

// Contact Page
Route::get ('/contact', 'ContactController@contactPage');
Route::post('/contact/add_new_contact', 'ContactController@addNewContact');

Route::get ('/profile', 'PagesController@profilePage');
