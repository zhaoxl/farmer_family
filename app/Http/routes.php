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
	Route::get('/my/messages/outbox', 'MessagesController@outbox');
	Route::get('/my/messages/{id}/destroy', 'MessagesController@destroy');
	Route::resource('/my/messages', 'MessagesController');
	Route::controller('/my','IndexController');
});

Route::get('/', 'IndexController@index');

Route::get('home', 'HomeController@index');

//Works
//Route::controller('works', 'WorksController');
Route::post('/works/evaluate', 'WorksController@evaluate');
Route::resource('works', 'WorksController');

//Staffs
//Route::controller('staffs', 'StaffsController');
Route::post('/staffs/evaluate', 'StaffsController@evaluate');
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
	Route::get('/admin/users/company_users', 'UsersController@company_users');
	Route::get('/admin/users/hire_users', 'UsersController@hire_users');
	Route::get('/admin/users/present_users', 'UsersController@present_users');
	Route::get('/admin/users/suicide_users', 'UsersController@suicide_users');
	Route::post('/admin/users/{user_id}/suicide', 'UsersController@suicide');
	Route::post('/admin/users/{user_id}/un_suicide', 'UsersController@un_suicide');
	Route::resource('/admin/users', 'UsersController');
	Route::get('/admin/staffs/refresh', 'StaffsController@refresh');
	Route::get('/admin/staffs/top', 'StaffsController@top');
	Route::resource('/admin/staffs', 'StaffsController');
	Route::get('/admin/works/refresh', 'WorksController@refresh');
	Route::get('/admin/works/top', 'WorksController@top');
	Route::resource('/admin/works', 'WorksController');
	Route::resource('/admin/messages', 'MessagesController');
	Route::get('/admin/areas/{city_id}/streets', 'AreasController@streets');
	Route::get('/admin/areas/{city_id}/streets/create', 'AreasController@street_create');
	Route::post('/admin/areas/{city_id}/streets', 'AreasController@street_store');
	Route::get('/admin/areas/{city_id}/street/{id}/edit', 'AreasController@street_edit');
	Route::put('/admin/areas/street/{id}', 'AreasController@street_update');
	Route::delete('/admin/areas/street/{id}', 'AreasController@street_destroy');
	Route::delete('/admin/areas/street/{id}', 'AreasController@street_destroy');
	Route::resource('/admin/areas', 'AreasController');
	Route::resource('/admin/settings', 'SettingsController');
	Route::get('/admin/profile/change_pwd', 'ProfileController@change_pwd');
	Route::post('/admin/profile/change_pwd', 'ProfileController@change_pwd_save');
	Route::resource('/admin/profile', 'ProfileController');
	Route::resource('/admin/staff_evaluates', 'StaffEvaluatesController');
	Route::resource('/admin/work_evaluates', 'WorkEvaluatesController');
	Route::resource('/admin/work_categories', 'WorkCategoriesController');
	Route::resource('/admin/industries', 'IndustriesController');
	Route::get('/admin/ueditor', 'UeditorController@index');
	Route::post('/admin/ueditor', 'UeditorController@index');
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

