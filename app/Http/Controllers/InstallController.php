<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\user as User;
use Blog\category as Category;
use Blog\post as Post;
use Request;
use Crypt;

class InstallController extends Controller {

	public function installUser(){
		$input = Request::all();
		$pass = Crypt::encrypt($input['password']);
		$input['password'] = $pass;
		User::create($input);
		return view('install.install-config');
	}

	public function installConfig(){
		$input = Request::all();
		$user = User::all();
		$input['author'] = $user[0]['name'];
		$input['theme'] = 'default';
		Config::create($input);
		return view('install.install-category');
	}

	public function installCategory(){
		$input = Request::all();
		Category::create($input);
		$config = Config::first();
		$directory = app_path();
		$dir = str_replace("app", "resources\\views\delete", $directory);
		File::deleteDirectory($dir);
		return view('admin.admin');	
	}
}