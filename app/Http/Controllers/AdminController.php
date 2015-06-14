<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\user as User;
use Blog\category as Category;
use Blog\post as Post;
use Request;
use View;

class AdminController extends Controller {

	public function __construct(){
		$con = Config::all();
		$config = $con[0];
		View::share('config', $config);
	}

	public function admin(){
		$config = Config::all();
		if ( $config == null ) return view('install.install-user');
			return view('admin.admin');
	}

	public function config(){
		$users = User::all();
		$user = $users->lists('name', 'name');
		return view('admin.config')->withUser($user);
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
		$category = Category::all();
		$users = User::all();
		$cat = $category->lists('name', 'name');
		$user = $users->lists('name', 'name');

		return view('admin.writepost')->withCat($cat)->withUsers($user);
	}

	public function addPost(){
		$input = Request::all();
		Post::create($input);
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts);
	}

	public function editPost(){
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts);
	}

	public function manageCat(){
		$category = Category::all();
		return view('admin.managecat')->withCategory($category);
	}

	public function manageUsers(){
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