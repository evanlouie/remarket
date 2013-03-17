<?php

class Addflagforeign {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('flags', function($table) {
			$table->foreign('account_id')->references('id')->on('accounts')->on_delete('cascade');
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
		//
		Schema::table('flags', function($table) {
			$table->drop_foreign('flags_account_id_foreign');
			$table->drop_foreign('flags_listing_id_foreign');
		});
	}

}