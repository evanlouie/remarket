<?php

class Create_Roles {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('roles', function($table) {
			$table->increments('id');
			$table->integer('role_id')->unsigned()->index();
			$table->string('role');
		});
		$role = new Role;
		$role->role_id=0;
		$role->role="admin";
		$role->save();
		$role = new Role;
		$role->role_id=1;
		$role->role='user';
		$role->save();
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('roles');
	}

}