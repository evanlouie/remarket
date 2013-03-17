<?php

class Createstaticpages {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('staticpages', function($table){
			$table->increments('id');
			$table->string('title');
			$table->text('body');
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
		Schema::drop('staticpages');
	}

}