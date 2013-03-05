<?php

class Create_Account {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function($table) 
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password');
			$table->integer('wishlist_frequency');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}