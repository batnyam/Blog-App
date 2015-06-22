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
		$config = Config::all()->get(0);
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
		return view('admin.manageusers')->withUsers($users);
	}

	
}