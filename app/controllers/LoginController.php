<?php

class LoginController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return view
	 */
	public function getIndex()
	{
		return View::make("login");
	}

	public function postCheck(){
		if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
			return Redirect::to('customer')->with('message', '欢迎进入客户管理系统!');
		} else {
			//var_dump(Input::get());exit;
			return Redirect::to('login')->with('message', '<font color="red">用户名或密码不正确!</font>')->withInput();
		}	
	}

	public function getLogout(){
		if(Auth::check()){
			Auth::logout();
			return Redirect::to('login');
		}
	}


	public function getClearcache(){
		Cache::forget("customer_trades");
		Cache::forget("customer_zones");
		return ;
	}
}
