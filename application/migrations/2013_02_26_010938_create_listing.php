<?php

class Create_Listing {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('listings', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('category_id')->unsigned();
			$table->integer('quantity');
			$table->float('price');
			$table->date('date_expiry');
			$table->date('date_available');
			$table->date('date_unavailable');
			$table->timestamps();
			$table->integer('location_id')->unsigned();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('listings');
	}

}