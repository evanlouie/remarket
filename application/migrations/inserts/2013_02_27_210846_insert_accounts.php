<?php

class Insert_Accounts {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		for($i = 1; $i<=10; $i++)
		{
			$account = new Account;
			$account->email = "$i@gmail.com";
			$account->password = Hash::make($i);
			$account->wishlist_frequency = $i;
			$account->save();
		}
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		$accounts = Account::all();
		foreach($accounts as $account)
		{
			$account->delete();
		}
	}

}