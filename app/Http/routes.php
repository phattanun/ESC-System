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
// Test
Route::get('/testLoginResponseForDebugNaja', function(){ return view('test'); });
Route::post('/testLoginResponseForDebugNaja/loginWithResponse', 'PagesController@debug_login');

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
Route::post('/save_news', 'NewsController@save_news');

// Meeting Room
Route::get ('/room/map', 'RoomController@getMap');
Route::get ('/room/reserve', 'RoomController@viewReservePage');
Route::get ('/room/reserve/mobile', 'RoomController@viewReserveMobilePage');
Route::get ('/room/approve', 'RoomController@viewApprovePage');
Route::post('/room/approve', 'RoomController@approveReservation');
Route::post('/room/edit_announcement', 'RoomController@editAnnouncement');
Route::get ('/room/get_room_reservation_schedule', 'RoomController@getRoomReservationSchedule');
Route::get ('/room/get_room', 'RoomController@getMeetingRoom');
Route::post('/room/get_user_reservation', 'RoomController@getUserReservation');
Route::post('/room/get_guest_reservation', 'RoomController@getGuestReservation');
Route::post('/room/user/submit_request', 'RoomController@UserSubmitRequest');
Route::post('/room/guest/submit_request', 'RoomController@GuestSubmitRequest');
Route::get ('/room/room-manage', 'RoomController@roomManagePage');
Route::post('/room/room-manage/edit_room', 'RoomController@editRoom');
Route::post('/room/room-manage/edit_image', 'RoomController@editImage');

Route::get ('/room/search', 'RoomController@roomSearchQuery');
Route::get ('/room/report', 'RoomController@roomReportQuery');
Route::post('/room/result', 'RoomController@roomResult');

// Supply

Route::get ('/supplies/search', 'InventoryController@invSearchQuery');
Route::get ('/supplies/report', 'InventoryController@invReportQuery');
Route::post('/supplies/result', 'InventoryController@invResult');
Route::get ('/supplies/outofstock', 'InventoryController@outOfStock');
Route::get ('/supplies', 'InventoryController@inventoryPageDefault');
Route::post('/supplies/search_count', 'InventoryController@searchCountInventory');
Route::post('/supplies', 'InventoryController@changeToPage');
Route::get ('/supplies/auto_suggest', 'InventoryController@autoSuggest');
Route::post('/supplies/send_cart', 'InventoryController@sendCart');
Route::get ('/supplies/approve', 'InventoryController@viewApprove');
Route::get ('/supplies/approve/{page}', 'InventoryController@viewApprove');
Route::post('/supplies/approve/list/{page}', 'InventoryController@getBorrowList');
Route::post('/supplies/approve/modal', 'InventoryController@getApproveModal');
Route::post('/supplies/approve/approve','InventoryController@approveBorrowList');
Route::get ('/supplies/manage', 'InventoryController@viewManage');
Route::get ('/supplies/manage/{page}', 'InventoryController@viewManage');
Route::post('/supplies/manage/getTransaction', 'InventoryController@getTransaction');
Route::post('/supplies/manage/addTransaction', 'InventoryController@addTransaction');
Route::post('/supplies/manage/finishedBorrowList/{list_id}', 'InventoryController@finishedBorrowList');
Route::get ('/supplies/supplier', 'InventoryController@supplierPage');
Route::post('/supplies/supplier/search', 'InventoryController@searchSupplier');
Route::post('/supplies/delete_supplier', 'InventoryController@deleteSupplier');
Route::post('/supplies/edit_supplier', 'InventoryController@editSupplier');
Route::post('/supplies/add_supplier', 'InventoryController@addSupplier');
Route::get ('/supplies/{page}', 'InventoryController@inventoryPage');
Route::post('/supplies/create', 'InventoryController@createItem');
Route::post('/supplies/edit', 'InventoryController@editItem');
Route::post('/supplies/toggle_show_item', 'InventoryController@toggleShowItem');
Route::post('/supplies/edit_announcement', 'InventoryController@editAnnouncement');


// Students Search
Route::get ('/students', 'StudentController@studentsPage');
Route::get ('/students/getExcelFile', 'StudentController@generateXLS');
Route::post('/students/search', 'StudentController@search');

// Login/Logout Register
Route::post('/login', 'PagesController@cas_login');
Route::get ('/logout', 'PagesController@logout');
Route::get('/register', 'PagesController@register');
Route::post('/register', 'PagesController@registerConfirm');

// Setting Page
Route::get ('/setting', 'SettingController@index');
Route::get ('/setting/auto_suggest', 'SettingController@autoSuggest');
Route::post('/setting/edit_year', 'SettingController@editYear');
Route::post('/setting/edit_permission', 'SettingController@editPermission');
Route::post('/setting/edit_admin', 'SettingController@editAdmin');
Route::post('/setting/delete_permission', 'SettingController@deletePermission');
Route::post('/setting/add_new_permission', 'SettingController@addNewPermission');

// Activity Page
Route::get ('/activity/create','ActivityController@create');
Route::post('/activity/create/addEditor','ActivityController@addEditor');
Route::post('/activity/create/send_form','ActivityController@add_activity');
Route::get ('/activity/list','ActivityController@activity_list');
Route::post('/activity/list/getdetail','ActivityController@get_act_detail');
Route::post('/activity/list/edit_form','ActivityController@edit_activity');
Route::post('/activity/list/search_activity','ActivityController@search_activity');
Route::post('/activity/list/delete_activity','ActivityController@delete_activity');

Route::get ('/activity/auto_suggest','ActivityController@autoSuggest');
Route::get ('/activity/report','ActivityController@report');
Route::post('/activity/report','ActivityController@postReport');
Route::post('/activity/report/getxlsx','ActivityController@getExcel');
Route::get ('/activity/attachments/{file_id}','ActivityController@getFile');


// Contact Page
Route::get ('/contact', 'ContactController@contactPage');
Route::post('/contact/add_new_contact', 'ContactController@addNewContact');
Route::post('/contact/update_contact', 'ContactController@updateContact');
Route::post('/contact/drop_contact', 'ContactController@dropContact');

// Club Contact Page
Route::get ('/club_contact', 'ClubContactController@contactPage');
Route::post('/club_contact/add_new_contact', 'ClubContactController@addNewContact');
Route::post('/club_contact/update_contact', 'ClubContactController@updateContact');
Route::post('/club_contact/drop_contact', 'ClubContactController@dropContact');

// Profile Page
Route::get ('/profile', 'PagesController@profilePage');
Route::get ('/profile/{user_id}', 'PagesController@editProfilePage');
Route::post('/profile/{user_id}', 'PagesController@saveProfile');

// Help Page
Route::get ('/help', 'HelpController@showHelp');
Route::post('/help', 'HelpController@saveHelp');
