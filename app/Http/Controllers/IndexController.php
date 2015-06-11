<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\post as Post;

class IndexController extends Controller {

	public function Index(){
		$config = Config::find(1);
		$posts = Post::all()->sortByDesc('id');
		return view('index')->withConfig($config)->withPosts($posts);
	}
}

?>