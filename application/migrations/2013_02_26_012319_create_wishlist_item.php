<?php

class Create_Wishlist_Item {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('wishlistitems', function($table) 
		{
			$table->increments('id');
			$table->string('item');
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
		Schema::drop('wishlistitems');
	}

}