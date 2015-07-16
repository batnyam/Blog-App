<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\post as Post;
use Blog\category as Category;
use Blog\user as User;
use View;
use Request;
use URL;
use File;
use Input;
use Form;
use Redirect;

class PostController extends Controller {

	public function __construct(){
		$config = Config::first();
		View::share('config', $config);
	}

	public function writePost(){
		$post = null;
		$category = Category::all();
		$users = User::all();
		$cat = $category->lists('name', 'name');
		$user = $users->lists('name', 'name');

		//Get the media folders file
		$images = array();
		$base_url = URL::to('/');
		$url = public_path().'\media';
		$files = File::allFiles($url);
		for( $i = 0; $i < sizeof($files); $i++ )
		{
			$new_var = str_replace('\\', '/', $files[$i]);
			$var = strpos($new_var, 'media');
			$new_var_1 = substr($new_var, $var);
			$img = $base_url.'/'.$new_var_1;
			array_push($images, $img);
		}

		return view('admin.writepost')->withCat($cat)->withUsers($user)->withPost($post)->withImages($images);
	}

	public function addPost(){
		$input = Request::all();
		Post::create($input);
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts);
	}

	public function editPost(){
		$posts = Post::where('Status', '=', '1')->orderBy('created_at', 'desc')->get();
		$trashs = Post::where('Status', '=', '0')->orderBy('created_at', 'desc')->get();
		return view('admin.editpost')->withPosts($posts)->withTrashs($trashs);
	}

	public function trashPost($id){
		$post = Post::find($id);
		$post->Status = 0;
		$post->save();
		$posts = Post::all();
		return view('admin.editpost')->withPosts($posts);
	}

	public function deletePost($id){
		$post = Post::find($id);
		$post->delete();
		$posts = Post::where('Status', '=', '1')->orderBy('created_at', 'desc')->get();
		$trashs = Post::where('Status', '=', '0')->orderBy('created_at', 'desc')->get();
		return view('admin.editposts')->withPosts($posts)->withTrashs('trashs');
	}

	public function edit($id){
		$post = Post::find($id);
		$users = User::all();
		$category = Category::all();
		$cat = $category->lists('name', 'name');
		$user = $users->lists('name', 'name');

		//Get the media folders file
		$images = array();
		$base_url = URL::to('/');
		$url = public_path().'\media';
		$files = File::allFiles($url);
		for( $i = 0; $i < sizeof($files); $i++ )
		{
			$new_var = str_replace('\\', '/', $files[$i]);
			$var = strpos($new_var, 'media');
			$new_var_1 = substr($new_var, $var);
			$img = $base_url.'/'.$new_var_1;
			array_push($images, $img);
		}

		return view('admin.writepost')->withPost($post)->withCat($cat)->withUsers($user)->withImages($images);
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
		$trashs = Post::where('Status', '=', '0')->orderBy('created_at', 'desc')->get();
		return view('admin.editpost')->withPosts($posts)->withTrashs($trashs);
	}

	public function importID($id){
		$files = Input::file('image');
		$name = $files->getClientOriginalName();
		$path = public_path().'\media';
		$files->move($path, $name);
		return Redirect::to('admin/editpost-'.$id);
	}

	public function import(){
		$files = Input::file('image');
		$name = $files->getClientOriginalName();
		$path = public_path().'\media';
		$files->move($path, $name);
		return Redirect::to('admin/write-post');
	}
}

?>
