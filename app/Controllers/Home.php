<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {
			return view('landing_page');
		} else {
			return redirect()->to('login');
		}
	}

	public function login()
	{
		if (!session()->get('logged_in')) {
			return view('login');
		} else {
			return redirect()->to('/');
		}
	}

	public function register()
	{
		if (!session()->get('logged_in')) {
			return view('register');
		} else {
			return redirect()->to('/');
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('login');
	}

	public function status()
	{
		if (session()->get('logged_in')) {
			return view('status');
		} else {
			return redirect()->to('login');
		}
	}

	//--------------------------------------------------------------------

}
