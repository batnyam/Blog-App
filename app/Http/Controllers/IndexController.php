<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\post as Post;
use Blog\category as Category;
use View;

class IndexController extends Controller {

	public function __construct(){
		$config = Config::all()->get(0);
		$cats = Category::where('menu', '=', '1')->get();
		View::share('config', $config);
		View::share('cats', $cats);
	}

	public function index(){
		$config = Config::all()->get(0);
		$cats = Category::where('menu', '=', '1')->get();
		$posts = Post::where('status', '=', '1')->orderBy('created_at', 'desc')->paginate($config->posts);
		return view('index')->withPosts($posts);
	}

	public function postRead($id){
		$post = Post::find($id);
		return view('single')->withPost($post);
	}
	
	public function readAuthor($name){
		$config = Config::all()->get(0);
		$posts = Post::where('author', '=', $name)->paginate($config->posts);
		return view('index')->withPosts($posts);
	}
}

?>