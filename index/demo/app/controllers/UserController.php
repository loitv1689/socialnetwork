<?php 
	/**
	*  
	*/
	class UserController extends BaseController
	{
		/*
	public function postLogin(){
		if(User::check_login(Input::get('email'), Input::get('password'))){
			Session::start();
			return View::make('');
		} else echo "Đăng nhập không thành công";
	}*/
	public function postRegister(){
		$user = new User();
		$user->user_name=Input::get("username");
		$user->password=Input::get("password");
		$user->email=Input::get("email");
		$user->save();
		return View::make('home');
	}
	}
 ?>