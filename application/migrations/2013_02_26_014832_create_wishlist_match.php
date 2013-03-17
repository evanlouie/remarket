<?php

class Create_Wishlist_Match {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wishlistmatches', function($table) {
			$table->increments('id');
			$table->integer('wishlistitem_id')->unsigned();
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
		Schema::drop('wishlistmatches');
	}

}