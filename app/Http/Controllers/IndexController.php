<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\post as Post;
use Blog\category as Category;
use View;
use Request;
use Blog\comment as Comment;
use Redirect;

class IndexController extends Controller {

	public function __construct(){
		$config = Config::first();
		$cats = Category::where('menu', '=', '1')->get();
		View::share('config', $config);
		View::share('cats', $cats);
	}

	public function index(){
		$config = Config::first();
		$cats = Category::where('menu', '=', '1')->get();
		$posts = Post::where('status', '=', '1')->orderBy('created_at', 'desc')->paginate($config->posts);
		$posts->setPath('/blog/laravel/public/');
		return view('index')->withPosts($posts);
	}

	public function postRead($id){
		$post = Post::find($id);
		$comments = Comment::where('post_id', '=', $id)->orderBy('created_at', 'desc')->get();
		return view('single')->withPost($post)->withComments($comments);
	}
	
	public function readAuthor($name){
		$config = Config::first();
		$posts = Post::where('author', '=', $name)->orderBy('created_at', 'desc')->paginate($config->posts);
		$posts->setPath('/blog/laravel/public/');
		return view('index')->withPosts($posts);
	}

	public function breadcrumb(){
		$url = Request::getRequestUri();
		return $url;
	}

	public function comment($id){
		$ip = Request::getClientIP();
		$input = Request::all();
		$input['author_ip'] = $ip;
		$input['post_id'] = $id;	
		Comment::create($input);
		return Redirect::to('/postread-'.$id);
	}
}

?>