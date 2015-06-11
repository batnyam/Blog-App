<?php

use Blog\config as Config;
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
Route::get('/admin', 'AdminController@admin');
Route::post('/admin/install', 'AdminController@install');
Route::get('/admin/config', 'AdminController@config');
Route::get('/admin/write-post', 'AdminController@writePost');
Route::get('/admin/edit-post', 'AdminController@editPost');
Route::get('/admin/category', 'AdminController@manageCat');
Route::get('/admin/users', 'AdminController@manageUsers');
Route::post('/admin/write-post', 'AdminController@addPost');
Route::post('/admin/config', 'AdminController@configUpdate');
Route::get('/postread-{id}', 'AdminController@postRead');
Route::get('/page-{page}', 'AdminController@page');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


hi!
