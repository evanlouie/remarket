<?php

class Create_Location {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('locations', function($table) 
		{
			$table->increments('id');
			$table->string('address');
			$table->string('city');
			$table->string('postal_code');
			$table->integer('account_id')->unsigned();
		});	
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locations');
	}

}