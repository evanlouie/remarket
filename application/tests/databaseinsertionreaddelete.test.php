<?php

class TestdatabaseInsertionReadDelete extends PHPUnit_Framework_TestCase {

	/**
	 * Test that a given condition is met.
	 *
	 * @return void
	 */
	public function testinsertReadDelete()
	{
		$account = new Account;
		$account->email = 'test@test.com';
		$account->password = Hash::make('password');
		$account->save();

		$read = Account::where_email('test@test.com')->first();
		if (Hash::check('password', $read->password))
		{
			$this->assertTrue(true);	
		}
		
	}

}
