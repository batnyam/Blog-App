<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\post as Post;
use Blog\category as Category;
use View;

class CategoryController extends Controller {

	public function __construct(){
		$config = Config::all()->get(0);
		$cats = Category::all();
		View::share('config', $config);
		View::share('cats', $cats);
	}

	public function readCat($name){
		$config = Config::all()->get(0);
		$posts = Post::where('category', '=', $name)->orderBy('created_at', 'desc')->paginate($config->posts);
		return view('index')->withPosts($posts);
	}

	public function manageCat(){
		$category = Category::all();
		return view('admin.managecat')->withCategory($category);
	}
}

?>