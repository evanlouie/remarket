<?php

class Foreign_Keys {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('wishlistitems', function($table) {
			$table->foreign('account_id')->references('id')->on('accounts')->on_delete('cascade');
		});
		Schema::table('locations', function($table) {
			$table->foreign('account_id')->references('id')->on('accounts')->on_delete('cascade');
		});
		Schema::table('listings', function($table) {
			$table->foreign('location_id')->references('id')->on('locations')->on_delete('cascade');
		});
		Schema::table('images', function($table) {
			$table->foreign('listing_id')->references('id')->on('listings')->on_delete('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wishlistitems', function($table) {
			$table->drop_foreign('wishlistitems_account_id_foreign');	
		});
		Schema::table('locations', function($table) {
			$table->drop_foreign('locations_account_id_foreign');	
		});
		Schema::table('listings', function($table) {
			$table->drop_foreign('listings_location_id_foreign');	
		});
		Schema::table('images', function($table) {
			$table->drop_foreign('images_listing_id_foreign');	
		});
	}

}