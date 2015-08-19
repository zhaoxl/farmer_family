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

Route::get('/', 'IndexController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Admin
Route::controller('auth_admin', 'Auth\AuthAdminController');
Route::controller('admin_process', 'AdminProcess\AdminUserController');
Route::resource('admin_process_message', 'AdminProcess\AdminMessageController');


//Logo
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//Ajax
Route::controller('ajax/area','Ajax\AreaController');