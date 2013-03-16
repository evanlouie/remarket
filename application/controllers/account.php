<?php

class Account_Controller extends Base_Controller {


	public function action_index()
	{
		if (Auth::check()) 
		{	
			$id = Session::get('id');
			$account = Account::find($id);

			// SHOW ACOUNT INFORMATION
			var_dump($account);
			var_dump($account->locations());
			// var_dump($account->wishlistitems());
		} 
		else 
		{
			// Show login screen
			echo "Login Screen";
		}
		
		
	}

	public function action_email($email)
	{
		$decode = urldecode($email);
		$account = Account::where_email($decode)->first();
		if($account) 
		{
			var_dump($account);
			var_dump($account->locations());
			// var_dump($account->wishlistitems());
		}
		else 
		{
			echo "No user registered under that email address";
		}
	}

	public function action_id($id)
	{
		$account = Account::find($id);
		if ($account)
		{
			var_dump($account);
			var_dump($account->locations());
			// var_dump($account->wishlistitems());
		}
		else
		{
			echo "No user registered under that ID";
		}
	}

	public function action_create()
	{
		if (Input::has('email') && Input::has('password'))
		{
			$size = Account::where_email(Input::get('email'));
			if($size->count()==0)
			{
				$email = Input::get('email');
				$password = Hash::make(Input::get('password'));
				$account = new Account;
				$account->email = $email;
				$account->password = $password;
				$account->save();
				return Redirect::to('account');
			}
			else echo "email already registered";
		}
		else 
		{
			die('inputs incorect');
			return false;
		}
	}

	public function action_delete() 
	{
		if (Input::has('id'))
		{
			$account = Account::find('id');
			$account->delete();
			Session::flush();
			return Redirect::to('home');
		}
		else 
		{
			die('accuont id not set');
			return false;
		}
	}

	public function action_edit()
	{
		if (Input::has('email') && Input::has('password') && Input::has('oldpassword')) 
		{

			$email = Input::get('email');
			$password = Input::get('password');
			$password = Hash::make($password);
			$oldpassword = Input::get('oldpassword');
			$account = Account::find(Session::get('id'));
			
			if ($account && Hash::check($oldpassword, $account->password))
			{
				$account->email = $email;
				$account->password = $password;
				$account->save();
			}
			else
			{
				echo "Error:", "session data does not match recods; please make sure cookies are enabled";
			}
		}
		else 
		{
			// Show Edit Account Settings Form
			$view = View::make('account.details.index')->with('title', 'Change Account Details');
			return $view;
		}
		
	}
	public function action_login()
	{
		if (Input::has('email') && Input::has('password'))
		{
			$cred = array(
				'username'=>Input::get('email'), 
				'password'=>Input::get('password'));
			if (Auth::attempt($cred))
			{
				$account = Account::where_email(Input::get('email'))->first();
				Session::put('id', $account->id);
				return Redirect::to('account');
			}
			else 
			{
				echo "invalid username or password";
			}
		}
		else
		{
			// SHOW LOGIN SCREEN
			echo "LOIGN SCREEN";
		}
	}
	public function action_logout()
	{
		Auth::logout();
		return Redirect::to('home');
	}

	public function action_mylistings()
	{
		if(Auth::check())
		{
			if(Session::has('id'))
			{
				$id = Session::get('id');
				$account = Account::find($id);
				$locations = $account->locations()->get();
				foreach ($locations as $location)
				{
					$listings = $location->listings()->get();
					foreach($listings as $listing) 
					{
						var_dump($listing);	
					}
				}
			}
		}
	}
}