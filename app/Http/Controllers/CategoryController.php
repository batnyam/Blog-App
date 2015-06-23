<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\category as Category;
use View;
use Request;
use Blog\post as Post;

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
		$posts->setPath('/blog/laravel/public/');
		return view('index')->withPosts($posts);
	}

	public function manageCat(){
		$cat = null;
		$category = Category::all();
		return view('admin.managecat')->withCat($cat);
	}

	public function editCat($id){
		$cat = Category::find($id);
		return view('admin.managecat')->withCat($cat);
	}

	public function updateCat($id){
		$input = Request::all();
		$cat = Category::find($id);
		$cat->name = $input['name'];
		$cat->description = $input['description'];
		$cat->menu = $input['menu'];
		$cat->Save();
		$cat = null;
		return view('admin.manageCat')->withCat($cat);
	}
}

?>