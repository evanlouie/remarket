<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function __construct() 
	{
		Asset::add('bootstrap', 'css/bootstrap.min.css');
		Asset::add('bootstrap-responsive', 'css/bootstrap-responsive.css');
		Asset::add('common', 'css/common.css');
		// Asset::add('style', 'css/style.css');
		Asset::add('fontawsome', 'css/fontawesome.css');
		Asset::add('flickcss', 'css/flick/jquery-ui-1.10.2.custom.css');
		Asset::add('jquery', 'js/jquery-1.9.1.js');
		Asset::add('jqueryui', 'js/jquery-ui-1.10.2.custom.js');
		Asset::add('bootstrap-js', 'js/bootstrap.min.js');

		if (Session::has('id') && Auth::check())
		{
			$account = Account::find(Session::get('id'));
			if ($account->admin == 1)
			{
				Session::put('admin', '1');
			}
			else 
			{
				Session::put('admin', '0');
			}
			if($account->blocked == 1 ) 
			{
				Session::put('alert', "Your account has been banned. Please contact the admin for more details");
				Session::forget('id');
				Auth::logout();
			}
			else 
			{

			}
		}
	}

}