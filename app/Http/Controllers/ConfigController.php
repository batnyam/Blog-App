<?php namespace Blog\Http\Controllers;

use Blog\user as User;
use Request;
use View;
use Blog\config as Config;

class ConfigController extends Controller {

	public function __construct(){
		$config = Config::first();
		View::share('config', $config);
	}

	public function configUpdate(){
		$config = Config::first();

		$users = User::all();
		$user = $users->lists('name', 'name');

		$input = Request::all();
		$config->title = $input['title'];
		$config->description = $input['description'];
		$config->author = $input['author'];
		$config->facebook = $input['facebook'];
		$config->youtube = $input['youtube'];
		$config->twitter = $input['twitter'];
		$config->google = $input['google'];
		$config->posts = $input['posts'];
		$config->metakey = $input['metakey'];
		$config->theme = $input['theme'];
		$config->save();
		
		return view('admin.config')->withUser($user);
	}

	public function config(){
		$config = Config::first();
		View::share('config', $config);
		$users = User::all();
		$user = $users->lists('name', 'name');
		return view('admin.config')->withUser($user);
	}

}