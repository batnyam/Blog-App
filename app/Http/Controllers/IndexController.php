<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\post as Post;
use Blog\category as Category;
use View;

class IndexController extends Controller {

	public function __construct(){
		$con = Config::all();
		$config = $con[0];
		View::share('config', $config);
	}

	public function index(){
		$con = Config::all();
		$cats = Category::where('menu', '=', '1')->get();
		$config = $con[0];
		$posts = Post::paginate($config->posts);
		//$posts = Post::all()->sortByDesc('id')->take($config->posts);
		return view('index')->withPosts($posts)->withCats($cats);
	}
}

?>