<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\user as User;
use Blog\category as Category;
use Blog\post as Post;
use Request;
use View;
use Auth;
use Crypt;

class AdminController extends Controller {

	public function __construct(){
		$con = Config::all();
		$config = $con[0];
		$cat = Category::where('menu', '=', '1')->get();
		View::share('config', $config);
		View::share('cats', $cat);
	}

	public function admin(){
		$config = Config::all();
		$label = '';
		if ( Auth::check()) {
			if ( $config == null ) return view('install.install-user');
			return view('admin.admin');
		}
		else return view('login')->withLabel($label);		
	}

	public function login(){
		$input = Request::all();
		$name = $input['username'];
		$pass = $input['password'];
		$users = User::where('name', '=', $name)->get();
		foreach ( $users as $user)
		{
			$r = Crypt::decrypt($user->password);
			if ( $pass == $r ) {
								Auth::login($user);
								return view('admin.admin')->withUser($user);
							   }
		}

		$label = 'Username or password is wrong';
		return view('login')->withLabel($label);
	}

	public function logout(){
		Auth::logout();
		$label = '';
		return view('login')->withLabel($label);
	}

	public function config(){
		$users = User::all();
		$user = $users->lists('name', 'name');
		return view('admin.config')->withUser($user);
	}

	public function readCat($name){
		$con = Config::all();
		$config = $con[0];
		$posts = Post::where('category', '=', $name)->paginate($config->posts);
		return view('index')->withPosts($posts);
	}

	public function readAuthor($name){
		$con = Config::all();
		$config = $con[0];
		$posts = Post::where('author', '=', $name)->paginate($config->posts);
		return view('index')->withPosts($posts);
	}

	public function configUpdate(){
		$input = Request::all();
		$config->title = $input['title'];
		$config->description = $input['description'];
		$config->author = $input['author'];
		$config->facebook = $input['facebook'];
		$config->youtube = $input['youtube'];
		$config->twitter = $input['twitter'];
		$config->google = $input['google'];
		$config->save();
	}

	public function writePost(){
		if ( Auth::check() == 0 ) {
			return '404';
		}
		$category = Category::all();
		$users = User::all();
		$cat = $category->lists('name', 'name');
		$user = $users->lists('name', 'name');

		return view('admin.writepost')->withCat($cat)->withUsers($user);
	}

	public function addPost(){
		if ( Auth::check() == 0 ) {
			return '404';
		}
		$input = Request::all();
		Post::create($input);
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts);
	}

	public function editPost(){
		if ( Auth::check() == 0 ) {
			return '404';
		}
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts);
	}

	public function manageCat(){
		if ( Auth::check() == 0 ) {
			return '404';
		}
		$category = Category::all();
		return view('admin.managecat')->withCategory($category);
	}

	public function manageUsers(){
		if ( Auth::check() == 0 ) {
			return '404';
		}
		$users = User::all();
		return view('admin.manageusers')->withUsers($users);
	}

	public function postRead($id){
		$post = Post::find(1);
		return view('single')->withPost($post);
	}

	public function page($page){
		$start = $config->posts * $page;
		$end = $start + $config->posts; // niit post nii hemjeenees hetersen esehiig shalgah
		$posts = Post::all()->sortByDesc('id')->where('id', ">", $start)->take(); //config iin ppp gees take ruu ugnu
	}


}