<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\user as User;
use Blog\category as Category;
use Blog\post as Post;
use Request;

class AdminController extends Controller {

	public function admin(){
		$config = Config::find(1);
		if ( $config == null ) return view('admin.install');
			return view('admin.admin')->withConfig($config);
	}

	public function install(){
		$input = Request::all();
		return $input;
	}

	public function config(){
		$users = User::all();
		$config = Config::find(1);
		$user = $users->lists('name', 'name');
		return view('admin.config')->withConfig($config)->withUser($user);
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

		return view('admin.writepost')->withConfig($config)->withCat($cat)->withUsers($user);
	}

	public function addPost(){
		$input = Request::all();

		Post::create($input);
		
		return view('admin.editpost');
	}

	public function editPost(){
		$config = Config::find(1);
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts)->withConfig($config);
	}

	public function manageCat(){
		$config = Config::find(1);
		$category = Category::all();
		return view('admin.managecat')->withConfig($config)->withCategory($category);
	}

	public function manageUsers(){
		$config = Config::find(1);
		$users = User::all();
		return view('admin.manageusers')->withConfig($config)->withUsers($users);
	}

	public function postRead($id){
		$post = Post::find(1);
		$config = Config::find(1);
		return view('single')->withConfig($config)->withPost($post);
	}

	public function page($page){
		$config = Config::find(1);
		$start = $config->posts * $page;
		$end = $start + $config->posts; // niit post nii hemjeenees hetersen esehiig shalgah
		$posts = Post::all()->sortByDesc('id')->where('id', ">", $start)->take(); //config iin ppp gees take ruu ugnu
	}


}