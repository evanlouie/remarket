<?php

class Createflag {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('flags', function($table) {
			$table->increments('id');
			$table->integer('account_id')->unsigned();
			$table->integer('listing_id')->unsigned();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('flags');
	}

}