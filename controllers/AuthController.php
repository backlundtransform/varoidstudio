<?php

class AuthController extends BaseController {

	protected $layout = 'master';
	
	
	public function login()
	{
		

	$this->layout->title = 'Logga in';
		$this->layout->content = View::make('auth/login');
	}
	
	
	public function logged_in()
	{

		if (User::find(Auth::user()->id)->roles == 'Admin'){ 

				return Redirect::to('users/'.Auth::user()->id);
			
		}
		return Redirect::to('posts');;
	}
	
	
	public function postlogin()
	{
		// get POST data
		
		$user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
		
		
		if (Auth::attempt($user))
		{
			// we are now logged in, go to home
			return Redirect::to('logged_in');
		}
		else
		{
			// auth failure! lets go back to the login
			return Redirect::to('login')
			->with('login_errors', true);
			// pass any error notification you want
			// i like to do it this way :)
		}
	}


	public function logout()
	{
		Auth::logout();
		return Redirect::to('posts');
	}
}