<?php

class Create_Account_Role {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('account_roles', function($table) {
			$table->increments('id');
			$table->integer('account_id')->unsigned();
			$table->integer('role_id')->unsigned();
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
		Schema::drop('account_roles');
	}

}