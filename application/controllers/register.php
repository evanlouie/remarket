<?php

class Register_Controller extends Base_Controller {

	public function action_index()
	{
		if(Input::has('email') && Input::has('password')) {
			$account = new Account;
			$account->email = Input::get('email');	
			$account->password = Hash::make(Input::get('password'));
			if ($account->save())
			{
				$account = Account::where_email(Input::get('email'))->first();
				Session::put('id', $account->id);
				return Redirect::home();
			}
		}
		else 
		{
			/// Output Registration Form
		}


		$user = Account::find(1);
		var_dump($user);
		$user = Account::where_password('password')->first();
		var_dump($user);

	}

	public function action_account($id)
	{
		$pass = Hash::make('password');
		if (Hash::check('password', $pass)) {
			echo $pass;
		}
		$user = Account::find($id);
		var_dump($user);
	}

}