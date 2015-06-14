<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\post as Post;
use View;

class IndexController extends Controller {

	public function __construct(){
		$con = Config::all();
		$config = $con[0];
		View::share('config', $config);
	}

	public function Index(){
		$con = Config::all();
		$config = $con[0];
		$posts = Post::all()->sortByDesc('id')->take($config->posts);
		return view('index')->withPosts($posts);
	}
}

?>