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
		if ( $config == null ) return view('admin.install-user');
			return view('admin.admin');
	}

	public function installUser(){
		$input = Request::all();
		User::create($input);
		return view('admin.install-config');
	}

	public function installConfig(){
		$input = Request::all();
		$user = User::all();
		$input['author'] = $user[0]['name'];
		$input['theme'] = 'default';
		Config::create($input);
		return view('admin.install-category');
	}

	public function installcat(){
		return view('admin.install-category');
	}

	public function installCategory(){
		$input = Request::all();
		Category::create($input);
		$con = Config::all();
		$config = $con[0];
		return view('admin.admin');
	}

	public function config(){
		$users = User::all();
		$user = $users->lists('name', 'name');
		return view('admin.config')->withUser($user);
	}

	public function configUpdate(){
		$input = Request::all();
		$config = Config::find(1);
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
		$config = Config::find(1);

		$cat = $category->lists('name', 'name');
		$user = $users->lists('name', 'name');

		return view('admin.writepost')->withCat($cat)->withUsers($user);
	}

	public function addPost(){
		$input = Request::all();

		Post::create($input);
		
		return view('admin.editpost');
	}

	public function editPost(){
		$config = Config::find(1);
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts);
	}

	public function manageCat(){
		$config = Config::find(1);
		$category = Category::all();
		return view('admin.managecat')->withCategory($category);
	}

	public function manageUsers(){
		$config = Config::find(1);
		$users = User::all();
		return view('admin.manageusers')->withUsers($users);
	}

	public function postRead($id){
		$post = Post::find(1);
		$config = Config::find(1);
		return view('single')->withPost($post);
	}

	public function page($page){
		$config = Config::find(1);
		$start = $config->posts * $page;
		$end = $start + $config->posts; // niit post nii hemjeenees hetersen esehiig shalgah
		$posts = Post::all()->sortByDesc('id')->where('id', ">", $start)->take(); //config iin ppp gees take ruu ugnu
	}


}