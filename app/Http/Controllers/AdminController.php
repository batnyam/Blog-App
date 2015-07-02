<?php namespace Blog\Http\Controllers;

use Blog\config as Config;
use Blog\user as User;
use Blog\category as Category;
use Blog\post as Post;
use Request;
use View;
use Auth;
use Crypt;
use File;
use URL;

class AdminController extends Controller {

	public function __construct(){
		$config = Config::first();
		$cat = Category::where('menu', '=', '1')->get();
		View::share('config', $config);
		View::share('cats', $cat);
	}

	public function home(){
		return view('admin.admin');
	}

	public function admin(){
		$config = Config::all();
		$label = '';
		if ( $config == null ) return view('install.install-user');
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

	public function manageUsers(){
		$users = User::all();
		$user = null;
		return view('admin.manageusers')->withUsers($users)->withUser($user);
	}

	public function editUser($id){
		$user = User::find($id);
		return view('admin.manageusers')->withUser($user);
	}

	public function updateUser($id){
		$user = User::find($id);
		$input = Request::all();
		$user->name = $input['name'];
		$user->email = $input['email'];
		$user->password = Crypt::encrypt($input['password']);
		$user->Save();
		$user = null;
		$users = User::all();
		return view('admin.manageusers')->withUser($user)->withUsers($users);
	}

	public function media(){
		$base_url = URL::to('/');
		$url = public_path().'\media';		
		$files = File::allFiles($url);
		for( $i = 0; $i < sizeof($files); $i++ )
		{
			$new_var = str_replace('\\', '/', $files[$i]);
			$var = strpos($new_var, 'media');
			$new_var_1 = substr($new_var, $var);
			$img = $base_url.'/'.$new_var_1;
			echo '<img src="'.$img.'" width="200px" height="200px">';
		}
	}
	
}