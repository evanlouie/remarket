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
		$account;
		if (Session::has('id')) 
		{
			$account = Account::find(Session::get('id'));
		}
		else 
		{
			return Redirect::to('/');
		}
		if (Input::has('email') && Input::has('emailConfirm') && Input::has('oldpassword')) 
		{
			$email = Input::get('email');
			$emailConfirm = Input::get('emailConfirm');
			
			// Check that emails match
			if( $email != $emailConfirm ) {
				// Error - Email fields do not match
				$error = "Emails do not match.";
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('error', $error)
				->with('account', $account);
				return $view;
			}
			
			$oldpassword = Input::get('oldpassword');
			$account = Account::find(Session::get('id'));
			// Check password
			if ($account && Hash::check($oldpassword, $account->password))
			{
				// Success - Update email and show confirmation
				$account->email = $email;
				$account->save();
				$confirmation = 'Your new email is ' . $email;
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('confirmation', $confirmation)
				->with('account', $account);
				return $view;
			}
			else
			{
				// Error - Password does not match
				$error = "Password does not match this account.";
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('error', $error)
				->with('account', $account);
				return $view;
			}
		} 
		else if (Input::has('password') && Input::has('passwordConfirm') && Input::has('oldpassword')) 
		{
			$password = Input::get('password');
			$passwordConfirm = Input::get('passwordConfirm');
			
			// Check that passwords match
			if( $password != $passwordConfirm ) {
				// Error - Password fields do not match
				$error = "Passwords do not match.";
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('error', $error)
				->with('account', $account);
				return $view;
			}
			
			$oldpassword = Input::get('oldpassword');
			$account = Account::find(Session::get('id'));
			// Check password
			if ($account && Hash::check($oldpassword, $account->password))
			{
				// Success - Update password and show confirmation
				$account->password = Hash::make($password);
				$account->save();
				$confirmation = 'Your password has been changed';
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('confirmation', $confirmation)
				->with('account', $account);
				return $view;
			}
			else
			{
				// Error - Password does not match
				$error = "Your old password was incorrect.";
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('error', $error)
				->with('account', $account);
				return $view;
			}
		} 
		else if (Input::has('expirationEmail') || Input::has('flagEmail') || Input::has('wishlistEmail')) 
		{
			if( Input::has('expirationEmail') ) {
				$account->expirationEmail = Input::get('expirationEmail');
			}
			if( Input::has('flagEmail') ) {
				$account->flagEmail = Input::get('flagEmail');
			}
			if( Input::has('wishlistEmail') ) {
				$account->wishlistEmail = Input::get('wishlistEmail');
			}
			$account->save();
			$confirmation = 'Your email settings have been update';
			$view = View::make('account.details.index')
			->with('title', 'Change Account Details')
			->with('confirmation', $confirmation)
			->with('account', $account);
			return $view;
		} 
		else if (Input::has('expirationEmail') || Input::has('flagEmail') || Input::has('wishlistEmail')
					|| Input::has('password') || Input::has('passwordConfirm') || Input::has('oldpassword')
					|| Input::has('email') || Input::has('emailConfirm') )
		{
			// Error - Missing fields
			$error = "You're missing some fields.";
			$view = View::make('account.details.index')
			->with('title', 'Change Account Details')
			->with('error', $error)
			->with('account', $account);
			return $view;
		}
		else 
		{
			// $account = Account::find(Session::get('id'));
			// Show Edit Account Settings Form
			$view = View::make('account.details.index')
			->with('title', 'Change Account Details')
			->with('account', $account);
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