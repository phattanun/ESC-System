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

Route::get('/', function () {
    return view('news');
});
Route::get('/supplies', function () {
    return view('supplies');
});

Route::get('schedule/manage', function () {
    return view('schedule-manage');
});
