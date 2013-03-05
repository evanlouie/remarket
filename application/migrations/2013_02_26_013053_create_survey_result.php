<?php

class Create_Survey_Result {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('surveyresults', function($table)
		{
			$table->increments('id');
			$table->string('material_type');
			$table->string('estimated_weight');
			$table->float('monetary_value');
			$table->integer('exchange_success');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('surveyresults');
	}

}