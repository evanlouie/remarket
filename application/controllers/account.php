<?php

class Account_Controller extends Base_Controller {


	public function action_index()
	{
		if (Session::has('id')) 
		{	
			$id = Session::get('id');
			$account = Account::find($id);

			// SHOW ACOUNT INFORMATION
			var_dump($account);
			var_dump($account->locations());
			var_dump($account->wishlistitems());
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
			var_dump($account->wishlistitems());
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
			var_dump($account->wishlistitems());
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
			$email = Input::get('email');
			$password = Hash::make(Input::get('password'));

			$account = new Account;
			$account->email = $email;
			$account->password = $password;
			$account->save();
			return true;
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
		if (Input::has('email') && Input::has('password')) 
		{
			$email = Input::get('email');
			$password = Input::get('password');
			$password = Hash::make($password);
			$account = Account::find(Session::get('id'));
			
			if ($account)
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
			return Redirect::to('account/');

		}
		
	}
	public function action_login()
	{
		if (Input::has('email') && Input::has('password'))
		{
			$account = where_email(Input::get('email'));
			if ($account)
			{
				if(Hash::check(Input::get('password'), $account->password))
				{
					Session::flush();
					Session::put('id', $account->id);
					return Redirect::to('account');
				}
				else 
				{
					die('Password Incorrect');
				}
			}
			else
			{
				die("No registered account to that email address");
			}
		}
		else
		{
			// SHOW LOGIN SCREEN
		}
	}

	public function action_logout()
	{
		Session::flush();
		return Redirect::to('home');
	}
}