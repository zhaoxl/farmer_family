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
//My
Route::group(['namespace' => 'My'], function()
{
	Route::controller('/my','IndexController');
});

Route::get('/', 'IndexController@index');

Route::get('home', 'HomeController@index');

//Works
//Route::controller('works', 'WorksController');
Route::resource('works', 'WorksController');

//Staffs
//Route::controller('staffs', 'StaffsController');
Route::resource('staffs', 'StaffsController');

Route::controller('area', 'AreaController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Admin
Route::group(['namespace' => 'Admin'], function()
{
	Route::controller('/admin/sessions', 'SessionsController');
	Route::resource('/admin/operation_logs', 'OperationLogsController');
	Route::resource('/admin/users', 'UsersController');
	Route::get('/admin/staffs/refresh', 'StaffsController@refresh');
	Route::get('/admin/staffs/top', 'StaffsController@top');
	Route::resource('/admin/staffs', 'StaffsController');
	Route::get('/admin/works/refresh', 'WorksController@refresh');
	Route::get('/admin/works/top', 'WorksController@top');
	Route::resource('/admin/works', 'WorksController');
	Route::resource('/admin/messages', 'MessagesController');
	Route::resource('/admin/settings', 'SettingsController');
	Route::get('/admin/profile/change_pwd', 'ProfileController@change_pwd');
	Route::post('/admin/profile/change_pwd', 'ProfileController@change_pwd_save');
	Route::resource('/admin/profile', 'ProfileController');
	Route::controller('/admin', 'IndexController');
});
Route::get('/admin', 'Admin\IndexController@index');

Route::controller('auth_admin', 'Auth\AuthAdminController');
Route::controller('admin_process', 'AdminProcess\AdminUserController');
Route::resource('admin_process_message', 'AdminProcess\AdminMessageController');


//Logo
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//Ajax
Route::controller('ajax/area','Ajax\AreaController');

