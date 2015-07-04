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

/* Front-End Routes */
Route::get('/', 'IndexController@index');
Route::get('/postread-{id}', 'IndexController@postRead');
Route::get('/author/{name}', 'IndexController@readAuthor');
Route::post('/comment-{id}', 'IndexController@comment');

/* Category Controller */
Route::get('/cat/{name}', 'CategoryController@readCat');

/* AdminController Controller */
Route::get('/admin', 'AdminController@admin');
Route::post('/admin/login', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');

Route::group(array( 'prefix' => 'admin', 'middleware' => 'auth' ), function(){

	Route::get('home', 'AdminController@home');
	/* Config Controller */
	Route::post('config', 'ConfigController@configUpdate');
	Route::get('config', 'ConfigController@config');

	/* Post Controller  */
	Route::get('write-post', 'PostController@writePost');
	Route::post('write-post', 'PostController@addPost');
	Route::get('edit-post', 'PostController@editPost');
	Route::get('editpost-{id}', 'PostController@edit');
	Route::post('editpost-{id}', 'PostController@updatePost');
	/* User Controller */
	Route::get('users', 'AdminController@manageUsers');
	Route::get('edituser-{id}', 'AdminController@editUser');
	Route::post('edituser-{id}', 'AdminController@updateUser');

	/* Category Controller */
	Route::get('category', 'CategoryController@manageCat');
	Route::get('catedit-{id}', 'CategoryController@editCat');
	Route::post('catedit-{id}', 'CategoryController@updateCat');
});

Route::group(array ( 'prefix' => 'install' ), function(){

	/* Install Routes */
	Route::post('install-user', 'InstallController@installUser');
	Route::post('install-config', 'InstallController@installConfig');
	Route::post('install-category', 'InstallController@installCategory');

});

Route::get('/auth/login', function(){
	return '404';
});
