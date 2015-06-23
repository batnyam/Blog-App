<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\post as Post;
use Blog\category as Category;
use Blog\user as User;
use View;
use Request;

class PostController extends Controller {

	public function __construct(){
		$config = Config::all()->get(0);
		View::share('config', $config);
	}

	public function writePost(){
		$post = null;
		$category = Category::all();
		$users = User::all();
		$cat = $category->lists('name', 'name');
		$user = $users->lists('name', 'name');
		return view('admin.writepost')->withCat($cat)->withUsers($user)->withPost($post);
	}

	public function addPost(){
		$input = Request::all();
		Post::create($input);
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts);
	}

	public function editPost(){
		$posts = Post::orderBy('created_at', 'desc')->get();
		return view('admin.editpost')->withPosts($posts);
	}

	public function edit($id){
		$post = Post::find($id);
		$users = User::all();
		$category = Category::all();
		$cat = $category->lists('name', 'name');
		$user = $users->lists('name', 'name');
		return view('admin.writepost')->withPost($post)->withCat($cat)->withUsers($user);
	}

	public function updatePost($id){
		$posts = Post::all();
		$post = Post::find($id);
		$input = Request::all();
		$post->Status = $input['status'];
		$post->Category = $input['category'];
		$post->Title = $input['title'];
		$post->Content = $input['content'];
		$post->Author = $input['author'];
		$post->tag = $input['tag'];
		$post->metakey = $input['metakey'];
		$post->excerpt = $input['excerpt'];
		$post->save();
		return view('admin.editpost')->withPosts($posts);
	}

}

?>