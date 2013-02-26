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
			$table->integer('wishlistitem_id')->unsigned();
			$table->integer('listing_id')->unsigned();
			$table->foreign('wishlistitem_id')->references('id')->on('wishlistitems');
			$table->foreign('listing_id')->references('id')->on('listings');
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