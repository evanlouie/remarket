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
				return Redirect::to('/');
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
		if (Session::has('id'))
		{
			$account = Account::find(Session::get('id'));
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

	public function action_block($id) 
	{
		$account = Account::find($id);
		$account->blocked = true;
		$account->save();
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
				$alert = '<div class="alert alert-error" style="margin-top: 45px; margin-bottom: -45px;"><strong>Error!</strong> ' .
							'Emails do not match.</div>';
				Session::put('alert', $alert);
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
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
				$alert = '<div class="alert alert-success" style="margin-top: 45px; margin-bottom: -45px;"><strong>Success!</strong> ' .
							'Your new email is ' . $email . '</div>';
				Session::put('alert', $alert);
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('account', $account);
				return $view;
			}
			else
			{
				// Error - Password does not match
				$alert = '<div class="alert alert-error" style="margin-top: 45px; margin-bottom: -45px;"><strong>Error!</strong> ' .
							'Password does not match this account.';
				Session::put('alert', $alert);
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
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
				$alert = '<div class="alert alert-danger container-fluid" style="margin-top: 45px; margin-bottom: -45px;"><strong>Error!</strong> ' .
							'Passwords do not match.</div>';
				Session::put('alert', $alert);
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
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
				$alert = '<div class="alert alert-success" style="margin-top: 45px; margin-bottom: -45px;"><strong>Success!</strong> ' .
							'Your password has been changed.</div>';
				Session::put('alert', $alert);
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('account', $account);
				return $view;
			}
			else
			{
				// Error - Password does not match
				$alert = '<div class="alert alert-danger" style="margin-top: 45px; margin-bottom: -45px;"><strong>Error!</strong> ' .
							'Your old password was incorrect.</div>';
				Session::put('alert', $alert);
				$view = View::make('account.details.index')
				->with('title', 'Change Account Details')
				->with('account', $account);
				return $view;
			}
		} 
		else if (Input::has('expirationEmail') || Input::has('flagEmail') || Input::has('wishlistEmail')) 
		{
			if( Input::has('expirationEmail') ) {
				$account->expirationEmail = Input::get('expirationEmail');
			} else {
				$account->expirationEmail = false;
			}
			if( Input::has('flagEmail') ) {
				$account->flagEmail = Input::get('flagEmail');
			} else {
				$account->flagEmail = false;
			}
			if( Input::has('wishlistEmail') ) {
				$account->wishlistEmail = Input::get('wishlistEmail');
			} else {
				$account->wishlistEmail = false;
			}
			$account->save();
			$alert = '<div class="alert alert-success" style="margin-top: 45px; margin-bottom: -45px;"><strong>Success!</strong> ' .
							'Your email settings have been updated.</div>';
			Session::put('alert', $alert);
			$view = View::make('account.details.index')
			->with('title', 'Change Account Details')
			->with('account', $account);
			return $view;
		} 
		else if (Input::has('expirationEmail') || Input::has('flagEmail') || Input::has('wishlistEmail')
					|| Input::has('password') || Input::has('passwordConfirm') || Input::has('oldpassword')
					|| Input::has('email') || Input::has('emailConfirm') )
		{
			// Error - Missing fields
			$alert = '<div class="alert alert-danger" style="margin-top: 45px; margin-bottom: -45px;"><strong>Error!</strong> ' .
							'You\'re missing some fields.</div>';
			Session::put('alert', $alert);
			$view = View::make('account.details.index')
			->with('title', 'Change Account Details')
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
			echo "LOGIN SCREEN";
		}
	}
	public function action_logout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('home');
	}

	public function action_flaggedlistings()
	{
		if(Auth::check())
		{
			if(Session::has('id'))
			{
				if(Session::get('admin') == 1) {
					$flags = Flag::all();
					$listings = array();
					foreach ($flags as $flag)
					{
						if( array_key_exists($flag->listing_id, $listings) ) {
							$listings[$flag->listing_id]->flags += 1;
						} 
						else {
							$listing = Listing::find($flag->listing_id);
							$listing->flags = 1;
							$listing->location = $listing->location()->first();
							$listing->category = Categorie::find($listing->category_id)->title;
							$listings[$listing->id] = $listing;
						}
					}

					$view = View::make('account.flagged_listings.index')
					->with('title', 'Flagged Listings')
					->with('listings', $listings);
					return $view;
				}
				else {
					Redirect::to('/account/mylistings');
				}
			}
		}
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
				$listings = array();
				foreach ($locations as $location)
				{
					foreach ($location->listings()->get() as $listing)
					{
						$listing->location = $listing->location()->first();
						$listing->category = Categorie::find($listing->category_id)->title;
						// var_dump($listing->category_id);
						array_push( $listings, $listing );
					}
				}

				$view = View::make('account.manage_listings.index')
				->with('title', 'My Listings')
				->with('listings', $listings);
				return $view;
			}
		}
	}

	public function action_mylocations()
	{
		if(Auth::check())
		{
			if(Session::has('id'))
			{
				$id = Session::get('id');
				$account = Account::find($id);
				$locations = $account->locations()->get();

				$view = View::make('account.manage_locations.index')
				->with('title', 'My Locations')
				->with('locations', $locations);
				return $view;
			}
		}
	}
}